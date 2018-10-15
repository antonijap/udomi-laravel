<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function show()
    {
        return view('login');
    }

    public function login()
    {
        // Validate
        $this->validate(request(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt(request(['email', 'password']))) {
            return redirect('dashboard');
        }

        return back()->withInput();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->home();
    }
}
