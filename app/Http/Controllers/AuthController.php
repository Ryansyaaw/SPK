<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return view('dashboard.home');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index')->with('success', 'Login berhasil');
        }        
    
        return back()->with('error', 'Email or Password salah');
    }    

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}