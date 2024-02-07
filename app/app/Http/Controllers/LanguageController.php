<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        if (array_key_exists($locale, config('app.locales'))) {
            session()->put('locale', $locale);
        }
        return back();
    }
    
}
