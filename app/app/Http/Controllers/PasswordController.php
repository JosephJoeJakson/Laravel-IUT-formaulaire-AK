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

class PasswordController extends Controller
{
    public function getpassword($id)
    {
   
    $userId = Auth::user()->id;
    $password = DB::table('passwords')->where('id', $id)->first();
    $decryptedPassword = Crypt::decryptString($password->password);
    $password->password = $decryptedPassword;
    return view('editpassword', ['password' => $password]);
    
    }

    public function getpasswordandteam($id)
    {
   
    $userId = Auth::user()->id;
    $password = DB::table('passwords')->where('id', $id)->first();
    $decryptedPassword = Crypt::decryptString($password->password);
    $password->password = $decryptedPassword;

    $user = Auth::user();
    $teams = Team::whereHas('users', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    })->with('users')->get();

    return view('addpasswordtoteam', ['password' => $password, 'teams' => $teams]);
    
    }

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
        return redirect('/showpassword');
    }
}