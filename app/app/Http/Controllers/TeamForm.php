<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TeamForm extends Controller
{
    
    public function store(Request $request): RedirectResponse
    {
        $userId = Auth::user()->id;
    
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|unique:teams', // Make sure to check 'unique' on 'teams' table
        ]);
    
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    
        $team = Team::create([
            'name' => $request->name,
        ]);
    
        // Associate the team with the user
        $team->users()->attach($userId);
    
        return redirect('/');
    }
}



