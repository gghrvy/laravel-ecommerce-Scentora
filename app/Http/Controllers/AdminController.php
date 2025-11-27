<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        return view('admin.dashboard', [
            'user' => $user
        ]);
    }

    public function settings(Request $request)
    {
        $user = $request->session()->get('user');
        return view('admin.settings', [
            'user' => $user
        ]);
    }
}
