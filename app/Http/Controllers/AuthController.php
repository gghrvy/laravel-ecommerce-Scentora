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

        
        $email = $request->email;
        $isAdmin = str_ends_with(strtolower($email), '@admin.com');
        $nameFromEmail = ucfirst(strtok($email, '@')) ?: 'User';

        $request->session()->put('user', [
            'name' => $nameFromEmail,
            'email' => $email,
            'is_admin' => $isAdmin
        ]);

        if ($isAdmin) {
            return redirect('/admin/dashboard')->with('success', 'Login successful! Welcome to Admin Dashboard!');
        }

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

        // Don't create session here - user should login explicitly after registration
        // This allows users to go back to register page if needed

        return redirect('/login')->with('success', 'Registration successful! Welcome to Scentora, ' . $request->name . '! Please login to continue.');
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
        return view('user.dashboard', ['user' => $user]);
    }
}
