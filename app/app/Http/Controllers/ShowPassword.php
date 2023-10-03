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
use Illuminate\Support\Facades\Crypt;
use App\Models\Password;

class ShowPassword extends Controller
{
    public function show(): View
    {
    $userId = Auth::user()->id;
    // $passwords = DB::table('passwords')->where('user_id', $userId)->get(); 
    $passwords = Password::where('user_id', $userId)->get(); 
    $decryptedPasswords = collect();
    foreach ($passwords as $login) {
        $decryptedPassword = Crypt::decryptString($login->password);
        $login->password = $decryptedPassword;
        $decryptedPasswords->push($login);
    }
    
    return view('showpassword', ['passwords' => $decryptedPasswords]);
    }
}