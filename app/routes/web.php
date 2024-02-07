<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewingController;
use App\Http\Controllers\PasswordandTeamController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|Routes permettant d'aller aux différentes pages
|
*/

// Aller à la page de landing
Route::get('/', [ViewingController::class, 'landing'])->name("landing");

// Aller à la page du dashbord
Route::get('/dashboard', [ViewingController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Changer la langue 
Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// PASSWORDS

// Aller à la page d'ajout d'un mot de passe
Route::get('/password-add', [PasswordController::class, 'add'])->name('password-add');

// Mettre le mot de passe dans la BDD
Route::post('/password-store', [PasswordController::class, 'store'])->name('password-store');

// Voir tout mot de passe 
Route::get('/password-display', [PasswordController::class, 'show'])->name('password-display');

// Récupère le mot de passe à modifier et le décrypte
Route::get('/password-edit/{id}',  [PasswordController::class, 'getpassword'])->name('password-edit');

// Change le mot de passe
Route::get('/password-update/{id}',  [PasswordController::class, 'update'])->name('password-update');

// Aller à la page pour asscoier un mot de passe à une team
Route::get('/password-add-team-get/{id}',  [PasswordandTeamController::class, 'getpasswordandteam'])->name('password-add-team-get');

// Associe un mot de passe à une Team
Route::get('/password-add-team-associate/{id}',  [PasswordandTeamController::class, 'associatePasswordWithTeam'])->name('password-add-team-associate');


// TEAMS

//Aller au fomulaire de création de team
Route::get('/team-create', [TeamController::class, 'create'])->name('team-create');

// Aller à la page du formulaire pour ajouter quelqu'un à une team 
Route::get('/team-choose', [TeamController::class, 'choose'])->name('team-choose');

// Mettre quelqu'un dans une team
Route::post('/team-join', [TeamController::class, 'join'])->name('team-join');

//Voir les teams dans lesquels l'utilisateur est
Route::get('/team-display', [TeamController::class, 'show'])->name('team-display');

//Aller au fomulaire de création de team
Route::post('/team-store', [TeamController::class, 'store'])->name('team-store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
