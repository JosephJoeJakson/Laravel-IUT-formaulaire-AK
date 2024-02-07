<?php
//
namespace App\Http\Controllers;

use App\Notifications\UserAddedToTeamNotification;
use App\Notifications\PasswordsNotification;
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
use App\Models\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;


class TeamController extends Controller
{
    
    // Redirection vers le formulaire pour ajouter quelqu'un à une team
    public function choose() : View {
        $user = Auth::user();
        $teams = Team::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->with('users')->get();

        return view('teamChoose', ['teams' => $teams]);
    }

    // Redirection vers le formulaire pour ajouter quelqu'un à une team
    public function create() : View {
        return view('teamCreate');
    }

    // Fonction pour créer une Team
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
    
        $team->users()->syncWithoutDetaching($userId);
    
        return redirect(route('dashboard'));
    }

    // Met un utilisateur dans une Team
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
    
                    return redirect(route('dashboard'));
                } else {
                    return redirect()->back()->withErrors(['email' => 'User is already a member of the team'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['email' => 'User not found'])->withInput();
            }
        } else {

            return redirect()->back()->withErrors(['name' => __('invalid_name_team')])->withInput();

        }
    }
    
    // Afficher les Teams de l'utilisateur
    public function show(): View
    {
        $user = Auth::user();
        $teams = Team::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->with('users', 'passwords')->get();

        $decryptedTeams = $teams->map(function ($team) {
            $team->passwords->each(function ($password) {
                $password->decryptedPassword = Crypt::decryptString($password->password);
            });
            return $team;
        });

        return view('teamDisplay', ['teams' => $decryptedTeams]);
    }

}






