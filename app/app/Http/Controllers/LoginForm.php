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

class LoginForm extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validated->fails()) {
            return redirect('/formulaire')
                ->withErrors($validated)
                ->withInput();
        } 

        Storage::put(Str::uuid().'.json', json_encode($validated->validated()));

        return redirect('/');
    }
}