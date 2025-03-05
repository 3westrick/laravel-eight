<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create() : View {
        return view('auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'     => ['required', 'string',],
            'password' => ['required', Password::min(5)->letters()->numbers(), 'confirmed'],
            'email'    => ['required', 'email', 'unique:users,email'],
        ]);

        $user = User::create($validated);

        Auth::login($user);
        
        return redirect()->route('jobs.index');
    }
}
