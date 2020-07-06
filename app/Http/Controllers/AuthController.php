<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auths.login');
    }
    public function postlogin(Request $request)
    {
        // dd($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('sukses', 'Login berhasil');
        }
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
