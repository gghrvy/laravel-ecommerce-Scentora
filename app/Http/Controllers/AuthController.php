<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $request->session()->put('user', [
            'name' => 'Demo User',
            'email' => $request->email
        ]);

        return redirect('/dashboard')->with('success', 'Login successful! Welcome back to Scentora!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        $request->session()->put('user', [
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/login')->with('success', 'Registration successful! Welcome to Scentora, ' . $request->name . '!');
    }

    public function logout(Request $request)
    {
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');
        return view('dashboard', ['user' => $user]);
    }
}
