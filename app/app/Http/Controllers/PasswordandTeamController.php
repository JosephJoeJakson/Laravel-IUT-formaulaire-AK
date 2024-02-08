<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Password;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PasswordsNotification;

class PasswordandTeamController extends Controller
{
    
    // Récupère le bon mot de passe et les Teams de l'utilisateur
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

    return view('passwordAddTeam', ['password' => $password, 'teams' => $teams]);
    
    }

    // Associe un mot de passe à une Team
    public function associatePasswordWithTeam($passwordId, Request $request)
    {
        $user = Auth::user();

        $selectedTeam = Team::where('name', $request->team)->first();

        if ($selectedTeam && $selectedTeam->users->contains($user)) {
 
            $password = Password::find($passwordId);
            $password->teams()->attach($selectedTeam);

            $teamUsers = $selectedTeam->users;

            foreach ($teamUsers as $teamUser) {
                $teamUser->notify(new PasswordsNotification($password, $selectedTeam));
            }
            return redirect(route('password-display'));
        } else {
            return redirect()->back()->withErrors(['team' => __('not_in_team')])->withInput();
        }
    }
}