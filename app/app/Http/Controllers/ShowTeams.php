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
use App\Models\Team;

class ShowTeams extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        $teams = Team::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();
    
        return view('showteams', ['teams' => $teams]);
    }
}
