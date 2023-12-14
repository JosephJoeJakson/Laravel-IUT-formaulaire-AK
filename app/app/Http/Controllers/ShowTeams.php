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
// use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Team;

class ShowTeams extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        $teams = Team::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->with('users', 'passwords')->get();

        // Decrypt passwords before passing to the view
        $decryptedTeams = $teams->map(function ($team) {
            $team->passwords->each(function ($password) {
                $password->decryptedPassword = Crypt::decryptString($password->password);
            });
            return $team;
        });

        return view('showteams', ['teams' => $decryptedTeams]);
    }
}
