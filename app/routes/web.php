<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginForm;
use App\Http\Controllers\ShowPassword;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamForm;
use App\Http\Controllers\ShowTeams;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Get to the dashboard 
Route::get('/', function () {
    return view('/dashboard');
});

//Aller au forulaire 
Route::get('/formulaire', function () {
    return view('formulaire');
});

//Aller au fomulaire de création de team
Route::get('/teamformulaire', function () {
    return view('teamformulaire');
});

//aller au formulaire pour rejoindre une team
Route::get('/jointeam', function () {
    return view('jointeam');
});

//Route pour voir tous mot de passe 
Route::get('/showpassword', [ShowPassword::class, 'show'])->name('showpassword');

//Route pour voir les teams dans lesquels vous êtes 
Route::middleware(['auth'])->get('/showteams', [ShowTeams::class, 'show'])->name('showteams');

//Route pour aller au formulaire d'ajout de mot de passe
Route::post('/formulaire', [LoginForm::class, 'store'])->name('LoginForm');

//Route pour le fomulaire de création de team
Route::post('/teamformulaire', [TeamForm::class, 'store'])->name('TeamCreate');

Route::post('/jointeam', [TeamForm::class, 'join'])->name('TeamJoin');

Route::get('/editpassword/{id}',  [PasswordController::class, 'getpassword'])->name('editpassword');

Route::get('/updatepassword/{id}',  [PasswordController::class, 'update'])->name('updatepassword');

Route::get('/addpasswordtoteam/{id}',  [PasswordController::class, 'getpasswordandteam'])->name('addpasswordtoteam');

Route::get('/addtoteam/{id}',  [TeamForm::class, 'associatePasswordWithTeam'])->name('addtoteam');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
