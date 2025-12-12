<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }

        $request->session()->put('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'is_admin' => $user->is_admin
        ]);

        if ($user->is_admin) {
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $isAdmin = str_ends_with(strtolower($request->email), '@admin.com');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

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
