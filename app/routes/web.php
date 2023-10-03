<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginForm;
use App\Http\Controllers\ShowPassword;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamForm;

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

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/formulaire', function () {
    return view('formulaire');
});

Route::get('/teamformulaire', function () {
    return view('teamformulaire');
});

Route::get('/showpassword', [ShowPassword::class, 'show'])->name('showpassword');

Route::get('/motdepasse', [ShowPassword::class, 'show'])->name('motdepasse');

Route::post('/formulaire', [LoginForm::class, 'store'])->name('LoginForm');

Route::post('/teamformulaire', [TeamForm::class, 'store'])->name('TeamForm');

Route::get('/editpassword/{id}',  [PasswordController::class, 'edit'])->name('editpassword');

Route::get('/updatepassword/{id}',  [PasswordController::class, 'update'])->name('updatepassword');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
