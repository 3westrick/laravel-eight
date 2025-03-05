<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required'],
            'email'    => ['required', 'email'],
        ]);

        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, the credentials don\'t match'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('jobs.index');

    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('home');
    }
}
