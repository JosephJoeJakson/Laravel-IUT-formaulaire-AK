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
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit($id)
    {
   
    $userId = Auth::user()->id;
    $password = DB::table('passwords')->where('id', $id)->first();
    $decryptedPassword = Crypt::decryptString($password->password);
    $password->password = $decryptedPassword;
    return view('editpassword', ['password' => $password]);
    
    }

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
        'site' => 'required|string',
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    DB::table('passwords')
        ->where('id', $id)
        ->update([
            'site' => $validated['site'],
            'login' => $validated['login'],
            'password' => Crypt::encryptString($validated['password']),
        ]);
        return redirect('/showpassword');
    }

}