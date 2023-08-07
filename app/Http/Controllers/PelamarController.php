<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Peringkat;
use App\Models\Wawancara;
use App\Models\Administrasi;
use App\Models\Keterampilan;
use Illuminate\Http\Request;
use App\Models\JadwalWawancara;
use App\Models\JadwalKeterampilan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelamarController extends Controller
{
    public function index(){
        $user = Auth::user();
        

        return view('user.profil.index', compact('user'));
    }

    public function updateProfil(Request $request){
        $user = Auth::user();
        $request->validate([
            'nik' => 'required',
            'name' => 'required|string|max:50', 
            'email' => 'required|string|max:255',
            // 'password' => 'string|max:50', 
            'jenis_kelamin' => 'nullable',
            'alamat' => 'required|string|max:50',  
            'tempat_lahir' => 'required|string|max:50', 
            'tanggal_lahir' => 'required|date', 
            'agama' => 'required|string|max:50', 
            'no_telpon' => 'required|string|max:50',  
            'pendidikan_terakhir' => 'required|string|max:50', 
            'nama_institusi' => 'required|string|max:50', 
            // 'cv' => 'file|mimes:pdf|max:2048', 
            // 'ijazah' => 'file|mimes:pdf|max:2048', 
            // 'skck' => 'file|mimes:pdf|max:2048', 
            // 'pas_foto' => 'file|mimes:jpeg,png,jpg|max:2048',
            'role' => 'nullable|string', 
        ]);

        $nik = $request->nik;

        // $validasiData['password'] = Hash::make($validasiData['password']);

        
        
        
        

        
        
        
        

        // Simpan file di direktori penyimpanan (storage)
        
        
        
        

        if($request->password == "") {
            $pass = $user->password;
        } else {
            $pass = Hash::make($request->password);
        }

        if($request->cv == "") {
            $cvlah = $user->cv;
        } else {
            $cv = $request->file('cv');
            $filecv = time()."_".$nik."_".$cv->getClientOriginalName();
            $cv = $filecv;
            $cvlah = $cv;
        }

        if($request->ijazah == "") {
            $ijazahlah = $user->ijazah;
        } else {
            $ijazah = $request->file('ijazah');
            $fileijazah = time()."_".$ijazah->getClientOriginalName();
            $ijazah = $fileijazah;
            $ijazahlah = $ijazah;
        }

        if($request->skck == "") {
            $skcklah = $user->skck;
        } else {
            $skck = $request->file('skck');
            $fileskck = time()."_".$skck->getClientOriginalName();
            $skck = $fileskck;
            $skcklah = $skck;
        }

        if($request->pas_foto == "") {
            $foto = $user->pas_foto;
        } else {
            $pas_foto = $request->file('pas_foto');
            $filepas_foto = time()."_".$pas_foto->getClientOriginalName();
            $pas_foto = $filepas_foto;
            $foto = $pas_foto;
        }
        // $role = "Pelamar";
        // $validasiData['role'] = $role;
        // $user->update($validasiData);

        User::where('id', $user->id)
        ->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $pass,
            'jenis_kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'no_telpon' => $request->no_telpon,
            'pendidikan_terakhir'=> $request->pendidikan_terakhir,
            'nama_institusi' => $request->nama_institusi,
            'cv' => $cvlah,
            'ijazah' => $ijazahlah,
            'skck' => $skcklah,
            'pas_foto' => $foto,
            'role' => $user->role,
        ]);

        return redirect('/pelamar/profil')->with('status', 'Profil berhasil diperbarui!');
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
        $pelamar = Auth::user();
        $tanggal_lamaran = Carbon::now();

        $dateFormat = $tanggal_lamaran->format('d-m-Y');
        


        return view('user.lamaran.edit', compact('lowongan', 'pelamar', 'dateFormat'));
    }


    public function storeLamaran(Request $request){
   
        // $id_lowongan = $request->input('id_lowongan');
        // $id_user = $request->input('id_user');
        // $tanggal_lamaran = Carbon::now();
        // $status = 'aktif';

        // $validasiData = $request->validate([
        //     // 'tanggal_lamaran' => 'required|max:50',
        //     // 'status' => 'required|max:50',
        //     'catatan' => 'required|max:50',
        // ]);

        // $lamaran = new Lamaran($validasiData);
        // $lamaran->id_lowongan = $id_lowongan;
        // $lamaran->id_user = $id_user;
        // $lamaran->tanggal_lamaran = $tanggal_lamaran;
        // $lamaran->status = $status;
        // $lamaran->save();

        $validasiData = $request->validate([
            'id_lowongan' => 'required',
            'catatan' => 'required|max:200',
        ]);

         $id_user = Auth::id();
        $tanggal_lamaran = Carbon::now();
         $status = 'aktif';

         $validasiData['id_user'] = $id_user;
         $validasiData['tanggal_lamaran'] = $tanggal_lamaran;
         $validasiData['status'] = $status;

         Lamaran::create($validasiData);





        // $id_lowongan = $request->input('id_lowongan');
        // $id_user = $request->input('id_user');

        // $validasiData = $request->validate([
        //     'tanggal_lamaran' => 'required|max:50',
        //     'status' => 'required|max:50',
        //     'catatan' => 'required|max:50',
        // ]);

        // $lamaran = new Lamaran($validasiData);
        // $lamaran->id_lowongan = $id_lowongan;
        // $lamaran->id_user = $id_user;
        // $lamaran->save();
        return redirect('/pelamar/lowongan')->with('status', 'Lamaran Berhasil Dikirim.');
    }


    public function lamaran(){
        $lamaran = Lamaran::all();
        $data = DB::table('lamarans')
        ->join('users', 'lamarans.id_user', '=', 'users.id')
        ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        ->select('lamarans.*', 'users.nik', 'users.name','lowongans.nama_bidang', 'lowongans.posisi')
        ->get();
        
        return view('user.lamaran.index', compact('lamaran', 'data'));
    }


    public function JadwalWawancara(){
        // $administrasi = Administrasi::all();
        $jadwal_wawancara = JadwalWawancara::all();
        $data = DB::table('jadwal_wawancaras')
        ->join('users', 'jadwal_wawancaras.id_user', '=', 'users.id')
        ->join('lamarans', 'jadwal_wawancaras.id_lamaran', '=', 'lamarans.id')
        ->select('jadwal_wawancaras.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran')
        ->get();
        
        return view('user.jadwal_wawancara.index', compact('jadwal_wawancara', 'data'));
    }

    public function Wawancara(){
        // $administrasi = Administrasi::all();
        $wawancara = Wawancara::all();
        $data = DB::table('wawancaras')
        ->join('users', 'wawancaras.id_user', '=', 'users.id')
        ->join('lamarans', 'wawancaras.id_lamaran', '=', 'lamarans.id')
        ->join('jadwal_wawancaras', 'wawancaras.id_jadwalWawancara', '=', 'jadwal_wawancaras.id')
        ->select('wawancaras.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran', 'jadwal_wawancaras.tanggal_tes')
        ->get();
        
        return view('user.wawancara.index', compact('wawancara', 'data'));
    }

    
    public function JadwalKeterampilan(){
        // $administrasi = Administrasi::all();
        $jadwal_keterampilan = JadwalKeterampilan::all();
        $data = DB::table('jadwal_keterampilans')
            ->join('users', 'jadwal_keterampilans.id_user', '=', 'users.id')
            ->join('lamarans', 'jadwal_keterampilans.id_lamaran', '=', 'lamarans.id')
            ->select('jadwal_keterampilans.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran')
            ->get();
        
        return view('user.jadwal_keterampilan.index', compact('data'));
    }



    public function Keterampilan(){
        // $administrasi = Administrasi::all();
        $keterampilan = Keterampilan::all();
        $data = DB::table('keterampilans')
            ->join('users', 'keterampilans.id_user', '=', 'users.id')
            ->join('lamarans', 'keterampilans.id_lamaran', '=', 'lamarans.id')
            ->join('jadwal_keterampilans', 'keterampilans.id_jadwalKeterampilan', '=', 'jadwal_keterampilans.id')
            ->select('keterampilans.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran', 'jadwal_keterampilans.tanggal_tes')
            ->get();
        
        return view('user.keterampilan.index', compact('keterampilan', 'data'));
    }















    // public function peringkat(){
    //     $peringkat = DB::table('users')
    //     ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
    //     ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
    //     ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
    //     ->select('users.name', 'users.no_telpon', 'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara' )
    //     ->get();
    //     $peringkatCount = DB::table('users')
    //     ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
    //     ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
    //     ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
    //     ->select('users.name', 'users.no_telpon', 'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara' )
    //     ->count();

    //     $userCount = User::count();

    //     $arrayKosong = array();

    //     foreach($peringkat as $item) {
    //         $name = $item->name;
    //         $no_telpon = $item->no_telpon;
    //         $total_admin = $item->total_admin;
    //         $total_terampil = $item->total_terampil;
    //         $total_wawancara = $item->total_wawancara;
    //         $total_semua = 0.3 * $total_admin + 0.4 * $total_terampil + 0.3 * $total_wawancara;

    //         $result = [
    //             'name' => $name,
    //             'no_telpon' => $no_telpon,
    //             'total_admin' => $total_admin,
    //             'total_terampil' => $total_terampil,
    //             'total_wawancara' => $total_wawancara,
    //             'total_semua' => $total_semua,
    //         ];

    //         array_push($arrayKosong, $result);
    //     }

    //     $sort = collect($arrayKosong)->sortByDesc('total_semua')->values()->all();
    //     // $peringkat = Peringkat::join('users', 'peringkat.id', '=', 'users.id')
    //     //     ->join('wawancara', 'peringkat.id', '=', 'wawancara.id')
    //     //     ->join('keterampilan', 'peringkat.id', '=', 'keterampilan.id')
    //     //     ->join('administrasi', 'peringkat.id', '=', 'administrasi.id')
    //     //     ->select(
    //     //         'peringkat.id',
    //     //         'user.name',
    //     //         'user.no_telpon',
    //     //         'wawancara.total',
    //     //         'keterampilan.total',
    //     //         'administrasi.total'
    //     //     )
    //     //     ->get();

    //     return view('user.peringkat.index', compact('sort', 'peringkatCount'));
    // }

    // YourController.php

// public function peringkat()
// {
//     $lowongans = Lowongan::all();

//     $sortedData = [];

//     foreach ($lowongans as $lowongan) {
//         $users = $lowongan->users()
//             ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
//             ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
//             ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
//             ->select('users.name', 'users.no_telpon', 'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara')
//             ->get();

//         foreach ($users as $user) {
//             $total_semua = 0.3 * $user->total_admin + 0.4 * $user->total_terampil + 0.3 * $user->total_wawancara;

//             $result = [
//                 'name' => $user->name,
//                 'no_telpon' => $user->no_telpon,
//                 'total_admin' => $user->total_admin,
//                 'total_terampil' => $user->total_terampil,
//                 'total_wawancara' => $user->total_wawancara,
//                 'total_semua' => $total_semua,
//             ];

//             $sortedData[$lowongan->nama_bidang][] = $result;
//         }
//     }

//     return view('user.peringkat.index', compact('sortedData'));
// }


public function peringkat()
{
    $lowongans = Lowongan::all();

    $sortedData = [];

    foreach ($lowongans as $lowongan) {
        $users = $lowongan->users()
            ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
            ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
            ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
            ->select('users.name', 'users.email', 'users.no_telpon', 'users.alamat', 'users.jenis_kelamin', 'users.pendidikan_terakhir',   'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara')
            ->get();

        foreach ($users as $user) {
            $total_semua = 0.3 * $user->total_admin + 0.4 * $user->total_terampil + 0.3 * $user->total_wawancara;

            $result = [
                'name' => $user->name,
                'email' => $user->email,
                'no_telpon' => $user->no_telpon,
                'alamat' => $user->alamat,
                'jenis_kelamin' => $user->jenis_kelamin,
                'pendidikan_terakhir' => $user->pendidikan_terakhir,
                'posisi' => $lowongan->posisi,
                'total_admin' => $user->total_admin,
                'total_terampil' => $user->total_terampil,
                'total_wawancara' => $user->total_wawancara,
                'total_semua' => $total_semua,
            ];

            // $sortedData[$lowongan->nama_bidang][] = $result;

            // $sortedData[$lowongan->nama_bidang][] = collect($result)->sortByDesc('total_semua')->values()->all();

            $sortedData[$lowongan->nama_bidang][] = $result;
        }

        // Sort users within each category based on 'Total Semua' (descending order)
        if (isset($sortedData[$lowongan->nama_bidang])) {
            usort($sortedData[$lowongan->nama_bidang], function ($a, $b) {
                return $b['total_semua'] <=> $a['total_semua'];
            });
        }
    }

    // Sort $sortedData by the highest 'Total Semua' value of each category (descending order)
    uasort($sortedData, function ($a, $b) {
        $total_a = max(array_column($a, 'total_semua'));
        $total_b = max(array_column($b, 'total_semua'));
        return $total_b <=> $total_a;
    });
        
    

    // $sortedData = collect($sortedData)->sortByDesc('total_semua')->values()->all();

    // return $sortedData;

    return view('user.peringkat.index', compact('sortedData'));
}

}
