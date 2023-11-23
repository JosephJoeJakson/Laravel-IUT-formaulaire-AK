<?php
//
namespace App\Http\Controllers;

use App\Notifications\UserAddedToTeamNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;
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
            'name' => 'required|string|unique:teams', 
        ]);
    
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    
        $team = Team::create([
            'name' => $request->name,
        ]);
    
        // Associate the team with the user
        $team->users()->syncWithoutDetaching($userId);
    
        return redirect('/');
    }

    public function join(Request $request)
{
    $user = Auth::user();
    
    $validated = Validator::make($request->all(), [
        'name' => 'string',
    ]);

    if ($validated->fails()) {
        return redirect()->back()->withErrors($validated)->withInput();
    }

    $team = Team::where('name', $request->name)->first();

    if ($team) {
        $team->users()->attach($user->id); // Attach the user to the team

        // Send notification to all team members
        $teamMembers = $team->users->except([$user->id]);
        $teamMembers->each(function ($teamMember) use ($team, $user) {
            $teamMember->notify(new UserAddedToTeamNotification($team, $user));
        });

        return redirect('/');
    } else {
        return redirect('/');
    }
}

}



