<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register/create form
    public function create()
    {
        return view('users.register');
    }

    // store user
    public function store(Request $request)
    {
        $formFeilds = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', ' email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFeilds['password'] = bcrypt($formFeilds['password']);

        // create user
        $user = User::create($formFeilds);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    // show login form
    public function login()
    {
        return view('users.login');
    }


    // authenticate user
    public function authenticate(Request $request)
    {
        $formFeilds = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (auth()->attempt($formFeilds)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
