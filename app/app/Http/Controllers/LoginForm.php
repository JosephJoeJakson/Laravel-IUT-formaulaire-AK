<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginForm extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'url' => 'required|string|url',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validated->fails()) {
            return redirect('/formulaire')
                ->withErrors($validated)
                ->withInput();
        }
        
        $password = Password::create([
            'site' => $request->url,
            'login' => $request->email,
            'password' => Crypt::encryptString($request->password),
            'user_id'=>Auth::user()->id,
        ]);

        

        return redirect('/');
    }

}