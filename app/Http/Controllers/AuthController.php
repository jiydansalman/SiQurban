<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showSignUp()
    {
        return view('sign_up');
    }
    
    public function signUp(Request $request)
    {
        //validasi
        $request->validate([
            'username'=>'required|string|min:5',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8|confirmed',
        ],[
            'password.confirmed' => 'Konfirmasi password Anda',
        ]);
        
        //simpan sumber
        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //direct ke login dengan pesan gacorrr
        return redirect()->route('showLogin')->with('success','Berhasil membuat akun, selamat menabung');
    }

    public function showLogin()
    {
        return view('login');
    }


    public function logIn(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|min:5',
            'password' => 'required|string|min:8',
        ]);
        // Cek apakah user dengan username tersebut ada
        $user = User::where('username', $request->username)->first();
    
        // Verifikasi password
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user);

            if ($user->role_id == 1){
                return redirect()->route('dashboard')->with('success', 'Login sebagai admin!');
            } else {
                return redirect()->route('home')->with('success', 'Login berhasil!');
            }
        } else {
            // Login gagal
            return back()->withErrors(['login' => 'Username atau password salah']);
        }
    }


}
