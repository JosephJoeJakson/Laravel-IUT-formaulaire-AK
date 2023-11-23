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
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\PasswordNotification;
use Illuminate\Support\Facades\Notification;


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
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
    
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    
        $team = Team::where('name', $request->name)->first();
    
        if ($team && $team->users->contains($user)) {
            $existingMember = User::where('email', $request->email)->first();
    
            if ($existingMember) {
                if (!$team->users->contains($existingMember)) {
                    $team->users()->attach($existingMember->id); // Attach the existing user to the team
    
                    // Send notification to all team members
                    $teamMembers = $team->users->where('id', '<>', $existingMember->id);
                    $teamMembers->each(function ($teamMember) use ($team, $existingMember, $user) {
                        $teamMember->notify(new UserAddedToTeamNotification($team, $existingMember, $user));
                    });
    
                    return redirect('/');
                } else {
                    // User is already a member of the team
                    return redirect()->back()->withErrors(['email' => 'User is already a member of the team'])->withInput();
                }
            } else {
                // User not found with the provided email
                return redirect()->back()->withErrors(['email' => 'User not found'])->withInput();
            }
        } else {
            // Team not found or user not a member of the team
            return redirect()->back()->withErrors(['name' => __('invalid_name_team')])->withInput();

        }
    }
    
public function associatePasswordWithTeam($passwordId, $teamId)
{
    // Associate the password with the team
    $password = Password::find($passwordId);
    $team = Team::find($teamId);
    $password->teams()->attach($team);

    // Get all users in the team
    $teamUsers = $team->users;

    // Send notification to each user in the team
    Notification::send($teamUsers, new PasswordNotification($password, $team));
    
    // Other logic...
}

// Similar logic for modifying and deleting passwords

}






