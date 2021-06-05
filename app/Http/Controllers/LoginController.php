<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('loginpost.login');
    }
    
    public function loginpost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
            
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function register()
    {
        return view('loginpost.register');
    }

    public function registerpost(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telpon' => 'required',
            'password' => 'required|min:6',
            'retype_password' => 'required_with:password|same:password'
            ]);
            
            $password = bcrypt($request->password);

            Users::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'telpon' => $request->telpon,
                'password' => $password,
            ]);
            
            return redirect('/login')->with('status', 'Selamat Anda sudah terdaftar!');
    }
}
