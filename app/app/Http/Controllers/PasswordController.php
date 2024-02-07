<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Password;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;



class PasswordController extends Controller
{

    // Redirection vers le formulaire d'ajout d'un mot de passe
    public function add() : View {
        return view('passwordAdd');
    }

    // Vérifie et enregistre le mot de passe donné par l'utilisateur
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'url' => 'required|string|url',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validated->fails()) {
            return redirect('/passwordAdd')
                ->withErrors($validated)
                ->withInput();
        }
        
        $password = Password::create([
            'site' => $request->url,
            'login' => $request->email,
            'password' => Crypt::encryptString($request->password),
            'user_id'=>Auth::user()->id,
        ]);

        return redirect(route('dashboard'));
    }

    // Affichier les mot de passe de l'utilisateur
    public function show(): View
    {
        $userId = Auth::user()->id;
        $passwords = Password::where('user_id', $userId)->get(); 
        $decryptedPasswords = collect();
        foreach ($passwords as $login) {
            $decryptedPassword = Crypt::decryptString($login->password);
            $login->password = $decryptedPassword;
            $decryptedPasswords->push($login);
        }

        $user = Auth::user();
        $teams = Team::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->with('users')->get();

        return view('passwordDisplay', ['passwords' => $decryptedPasswords, 'teams' => $teams]);
    }

    // Récupère le mot de passe et le décrypte pour pouvoir le modifier 
    public function getpassword($id)
    {
        $userId = Auth::user()->id;
        $password = DB::table('passwords')->where('id', $id)->first();
        $decryptedPassword = Crypt::decryptString($password->password);
        $password->password = $decryptedPassword;

        return view('passwordEdit', ['password' => $password]);
    }

    // Met à le mot de passe si nécéssaire
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'site' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        DB::table('passwords')
            ->where('id', $id)
            ->update([
                'site' => $validated['site'],
                'login' => $validated['login'],
                'password' => Crypt::encryptString($validated['password']),
            ]);

        $user = Auth::user();

        $selectedTeams = Team::where('password_id', $id);
    
        $password = Password::find($id);
        foreach ($selectedTeams as $selectedTeam) {
            $password->teams()->attach($selectedTeam);
    
            $teamUsers = $selectedTeam->users;
    
            foreach ($teamUsers as $teamUser) {
                $teamUser->notify(new PasswordsNotification($password, $selectedTeam));
            }
        }
        
        return redirect(route('password-display'));
    }
}