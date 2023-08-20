<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelamarLoginController extends Controller
{
    public function showLogin(){
        return view('loginPelamar.login');
    }

    public function login(Request $request){
        // $credentials = $request->only('email', 'password');

        // if(Auth::guard('user')->attempt($credentials)){
        //     // Jika login berhasil maka masuk ke dashboard
        //     // return redirect('pelamar/dashboard')->with('status', 'Data berhasil ditambah!');
        //     return redirect()->intended('/pelamar/dashboard');
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

        $loginPelamar = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($loginPelamar)){
            // dd($loginPelamar);
            return redirect('/pelamar')->with('status', 'Berhasil masuk');
        }else {
            return redirect('/pelamar')->withErrors('Email atau Password Salah')->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function register(){
        return view('loginPelamar.register');
    }
    
    public function store(Request $request){
        // dd($request->all());

        $validasiData = $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required|string|max:50', 
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:50', 
            'jenis_kelamin' => 'nullable',
            'alamat' => 'required|string|max:50',  
            'tempat_lahir' => 'required|string|max:50', 
            'tanggal_lahir' => 'required|date', 
            'agama' => 'required|string|max:50', 
            'no_telpon' => 'required|string|max:50',  
            'pendidikan_terakhir' => 'required|string|max:50', 
            'nama_institusi' => 'required|string|max:50', 
            'cv' => 'required|file|mimes:pdf|max:2048', 
            'ijazah' => 'required|file|mimes:pdf|max:2048', 
            'skck' => 'required|file|mimes:pdf|max:2048', 
            'pas_foto' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'role' => 'nullable|string', 
        ]);

        $nik = $request->nik;

        $validasiData['password'] = Hash::make($validasiData['password']);


        $cv = $request->file('cv');
        $nama_cv = 'cv'.'_'.date('Ymdhis').'.'.$request->file('cv')->getClientOriginalExtension();
    
        $cv->move('dokumen/',$nama_cv);

        $ijazah = $request->file('ijazah');
        $nama_ijazah = 'ijazah'.'_'.date('Ymdhis').'.'.$request->file('ijazah')->getClientOriginalExtension();
   
        $ijazah->move('dokumen/',$nama_ijazah);

        $skck = $request->file('skck');
        $nama_skck = 'skck'.'_'.date('Ymdhis').'.'.$request->file('skck')->getClientOriginalExtension();

        $skck->move('dokumen/',$nama_skck);

        $pas_foto = $request->file('pas_foto');
        $nama_pas_foto = 'pas_foto'.'_'.date('Ymdhis').'.'.$request->file('pas_foto')->getClientOriginalExtension();

        $pas_foto->move('img/',$nama_pas_foto);
      

    

    
        // $dtUpload->save();

        // $role = "Pelamar";
        $role = "user";
        $validasiData['role'] = $role;
        $validasiData['cv'] = $nama_cv;
        $validasiData['ijazah'] = $nama_ijazah;
        $validasiData['skck'] = $nama_skck;
        $validasiData['pas_foto'] = $nama_pas_foto;

        $user =  User::create($validasiData);
        Auth::login($user);

        // dd($validasiData);

        return redirect('/pelamar/dashboard')->with('success', 'Data berhasil disimpan.');



        // $dtUpload = new User();
        // $dtUpload->nik = $request->nik;
        // $dtUpload->name = $request->name;
        // $dtUpload->email = $request->email;
        // $dtUpload->password = $request->password;
        // $dtUpload->jenis_kelamin = $request->jenis_kelamin;
        // $dtUpload->alamat = $request->alamat;
        // $dtUpload->tempat_lahir = $request->tempat_lahir;
        // $dtUpload->tanggal_lahir = $request->tanggal_lahir;
        // $dtUpload->agama = $request->agama;
        // $dtUpload->no_telpon = $request->no_telpon;
        // $dtUpload->pendidikan_terakhir = $request->pendidikan_terakhir;
        // $dtUpload->nama_institusi = $request->nama_institusi;
        // $dtUpload->cv = $request->$filecv;
        // $dtUpload->ijazah = $request->$fileijazah;
        // $dtUpload->skck = $request->$fileskck;
        // $dtUpload->pas_foto = $request->$filepas_foto;
        // $dtUpload->role = $request->role;

     

        // User::create([
        // 'nik' => $request->nik,
        // 'name' => $request->name,
        // 'email' => $request->email,
        // 'password' => $request->password,
        // 'jenis_kelamin' => $request->jenis_kelamin,
        // 'alamat' => $request->alamat,
        // 'tempat_lahir' => $request->tempat_lahir,
        // 'tanggal_lahir' => $request->tanggal_lahir,
        // 'agama' => $request->agama,
        // 'no_telpon' => $request->no_telpon,
        // 'pendidikan_terakhir' => $request->pendidikan_terakhir,
        // 'nama_institusi' => $request->nama_institusi,
        // 'cv' => $request->$filecv,
        // 'ijazah' => $request->$fileijazah,
        // 'skck' => $request->$fileskck,
        // 'pas_foto' => $request->$filepas_foto,
        // 'role' => $request->role,
        // ]);

        // return redirect('/pelamar/profil');
    }

    public function dashboard() {
        return view('loginPelamar.dashboard');
    }
}
