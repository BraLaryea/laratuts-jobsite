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
            'email' => ['required', ' email', Rule::unique('listings', 'company')],
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
}
