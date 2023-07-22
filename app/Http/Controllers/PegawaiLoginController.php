<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiLoginController extends Controller
{
    public function showLogin(){
        return view('loginPegawai.login');
    }

    public function login(Request $request){
        // $credentials = $request->only('email', 'password');

        // if(Auth::guard('user')->attempt($credentials)){
        //     // Jika login berhasil maka masuk ke dashboard
        //     // return redirect('pelamar/dashboard')->with('status', 'Data berhasil ditambah!');
        //     return redirect()->intended('/Pegawai/dashboard');
        // }else {
        //     return back()->withErrors(['email' => 'Email atau password salah']);
        // }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $loginPegawai = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::guard('pegawai')->attempt($loginPegawai)){
          $pegawai = Pegawai::where('email', $request->input('email'))->first();

          if($pegawai->role === "admin"){
            return redirect('admin/dashboard')->with('status', 'Berhasil Login Sebagai Admin');
          }elseif($pegawai->role === "kepala bidang"){
            return redirect('kabid/dashboard')->with('status', 'Berhasil login sebagai Kepala Bidang');
          }

        }else{
            return redirect('/login/pegawai')->withErrors('Email atau Password Salah')->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
