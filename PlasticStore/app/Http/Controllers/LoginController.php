<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', 'LOGOUT SUCCESS');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {

            return redirect()->route('home')->with('success', 'LOGIN SUCCESS');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }
}
