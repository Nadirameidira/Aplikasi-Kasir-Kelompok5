<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() 
    { 
        return view('login'); 
    } 
 
    public function login(Request $request) 
    { 
        $credentials = $request->validate([ 
            'email' => ['required', 'email'], 
            'password' => ['required'], 
        ]); 
 
        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate(); 
        } 
        
         $user = User::where('email', $request->email)->first();

             if (!$user) {
            return back()->withErrors([
                'email' => 'User tidak ditemukan!'
            ])->withInput();
        }
        
         if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah!'
            ])->withInput();
        }
        
        if (Auth::user()->role == 'admin') { 
            return redirect()->intended('/admin'); 
        } elseif (Auth::user()->role == 'kasir') { 
            return redirect()->intended('/kasir'); 
        }
        
        Auth::logout();
        return back()->withErrors([ 
            'email' => 'Emaail atau password salah.', 
        ]); 
    } 
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'kasir',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
