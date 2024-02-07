<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ViewingController extends Controller
{
    
    public function landing() : View {
        return view('landing');
    }

    public function dashboard() : View {
        return view('dashboard');
    }

}