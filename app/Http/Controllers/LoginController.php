<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], 
    );

        $credentials = $request->only('username', 'password');
        $remember_me = $request->has('remember_me') ? true : false; 
        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        
        return redirect()->route('login')->with('error', 'Error!, Username or Password Wrong');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
