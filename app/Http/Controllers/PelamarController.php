<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lamaran;
use App\Models\User;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PelamarController extends Controller
{
    public function index(){
        $pelamar = User::all();

        return view('user.profil.index', compact('pelamar'));
    }

    public function create(){
        return view('user.profil.create');
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
        $ijazah = $request->file('ijazah');
        $skck = $request->file('skck');
        $pas_foto = $request->file('pas_foto');

        $filecv = time()."_".$nik."_".$cv->getClientOriginalName();
        $fileijazah = time()."_".$ijazah->getClientOriginalName();
        $fileskck = time()."_".$skck->getClientOriginalName();
        $filepas_foto = time()."_".$pas_foto->getClientOriginalName();

        $cv->move(public_path().'/dokumen',$filecv);
        $ijazah->move(public_path().'/dokumen',$fileijazah);
        $skck->move(public_path().'/dokumen',$fileskck);
        $pas_foto->move(public_path().'/img',$filepas_foto);
        // $dtUpload->save();

        $role = "Pelamar";
        $validasiData['role'] = $role;

        User::create($validasiData);

        // dd($validasiData);

        return redirect('/pelamar/profil/create')->with('success', 'Data berhasil disimpan.');



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

    public function dashboardLowongan(){
        $lowongan = Lowongan::orderBy('id', 'DESC')->limit(8)->get();
        $apply = DB::table('lamarans')
        ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        ->join('users', 'lamarans.id_user', '=', 'users.id')
        ->where('lamarans.id_user', 3)
        ->select('lamarans.*', 'lowongans.*')
        ->orderBy('lamarans.tanggal_lamaran', 'DESC')
        ->get();

        // return $apply;
        return view('user.dashboard',compact('lowongan', 'apply'));
    }

    public function viewLowongan($id) {
        // $apply = DB::table('lamarans')
        // ->where('lamarans.id_user', 3)
        // ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        // ->join('users', 'lamarans.id_user', '=', 'users.id')
        // ->select('lamarans.*', 'lowongans.*')
        // ->orderBy('lamarans.tanggal_lamaran', 'DESC')
        // ->get();

        $apply = DB::table('lowongans')->where('id', $id)->get();

        // return $apply;
        return view('user.lowongan.detail',compact('apply')); 
    }

    public function detailLowongan($id) {
        // $apply = DB::table('lamarans')
        // ->where('lamarans.id_user', 3)
        // ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        // ->join('users', 'lamarans.id_user', '=', 'users.id')
        // ->select('lamarans.*', 'lowongans.*')
        // ->orderBy('lamarans.tanggal_lamaran', 'DESC')
        // ->get();

        $apply = DB::table('lowongans')->where('id', $id)->get();

        // return $apply;
        return view('user.lamaran.detail',compact('apply')); 
    }


    public function indexLowongan(){
        $lowongan = Lowongan::all();

        return view('user.lamaran.lowongan',compact('lowongan'));
    }

    public function createLamaran($id){
        $lowongan = Lowongan::findOrFail($id);
        $pelamar = User::all();
        $tanggal_lamaran = Carbon::now();
        $dateFormat = $tanggal_lamaran->format('d-m-Y');


        return view('user.lamaran.edit', compact('lowongan', 'pelamar', 'dateFormat'));
    }


    public function storeLamaran(Request $request){
   
        $id_lowongan = $request->input('id_lowongan');
        $id_user = $request->input('id_user');
        $tanggal_lamaran = Carbon::now();
        $status = 'aktif';

        $validasiData = $request->validate([
            // 'tanggal_lamaran' => 'required|max:50',
            // 'status' => 'required|max:50',
            'catatan' => 'required|max:50',
        ]);

        $lamaran = new Lamaran($validasiData);
        $lamaran->id_lowongan = $id_lowongan;
        $lamaran->id_user = $id_user;
        $lamaran->tanggal_lamaran = $tanggal_lamaran;
        $lamaran->status = $status;
        $lamaran->save();

        return redirect('/pelamar/lowongan')->with('status', 'Lamaran Berhasil Dikirim.');
    }
}
