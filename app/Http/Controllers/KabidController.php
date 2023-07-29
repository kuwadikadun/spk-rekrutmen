<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Pegawai;
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
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class KabidController extends Controller
{
    public function dashboard(){
        $lowongan = Lowongan::all();

        return view('kabid.dashboard',compact('lowongan'));
    }


    public function indexLowongan(){
        $lowongan = Lowongan::all();

        return view('kabid.lowongan.index',compact('lowongan'));
    }


    public function createLowongan(){
        return view('kabid.lowongan.create');
    }

    public function storeLowongan(Request $request){
        $validasiData = $request->validate([
            'nama_bidang' => 'required|max:50',
            'posisi' => 'required|max:50',
            'deskripsi' => 'required|max:150',
            'kualifikasi' => 'required|max:150',
            'tanggal_publish' => 'required|max:50',
            'tanggal_tutup' => 'required|max:50',
        ]);

        $tanggal_publish = $request->input('tanggal_publish');
        $tanggal_tutup = $request->input('tanggal_tutup');
        
        if(strtotime($tanggal_publish) <= strtotime($tanggal_tutup) ){
            $status = 'Aktif';
        }else{
            $status = 'Tutup';
        }

        $validasiData['status'] = $status;
        $lowongan = new Lowongan($validasiData);
        $lowongan->setAttribute('status', $status);
     
        $lowongan->save();
        // $lowongan->tutupLowongan();


        // Lowongan::create($validasiData);

        return redirect('/kabid/lowongan')->with('status', 'Data berhasil ditambah.');
    }

    public function editLowongan($id){
        $lowongan = Lowongan::where('id', $id)->first();

        return view('kabid.lowongan.edit', compact('lowongan'));
    }


    public function updateLowongan(Request $request, $id){
        Lowongan::where('id', $id)->update([
            'nama_bidang' => $request->nama_bidang,
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'tanggal_publish' => $request->tanggal_publish,
            'tanggal_tutup' => $request->tanggal_tutup,
        ]);

        return redirect('/kabid/lowongan')->with('status', 'Data berhasil diubah.');
    }

    public function deleteLowongan($id) {
        Lowongan::destroy($id);
        return redirect('/kabid/lowongan')->with('status', 'Data berhasil dihapus.');
    }

    // End Lowongan


    // Lamaran
    public function lamaran(){
        $lamaran = Lamaran::all();
        $data = DB::table('lamarans')
        ->join('users', 'lamarans.id_user', '=', 'users.id')
        ->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id')
        ->select('lamarans.*', 'users.nik', 'users.name','lowongans.nama_bidang', 'lowongans.posisi')
        ->get();
        
        return view('kabid.lamaran.index', compact('lamaran', 'data'));
    }


    public function viewLamaran($id){
        $lamaran = Lamaran::where('id', $id)->get();
        return view('kabid.lamaran.view', compact('lamaran'));
    }


    // Pelamar
    public function pelamar(){
        $user = User::all();
        return view('kabid.pelamar.index', compact('user'));
    }





    // Akun
    public function indexAkun(){
        $akun = Pegawai::all();

        return view('kabid.akun.index', compact('akun'));
    }

    public function createAkun(){
        return view('kabid.akun.create');
    }

    public function storeAkun(Request $request){
        $validasiData = $request->validate([
            'name' => 'required|string|max:50', 
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:50', 
            'jenis_kelamin' => 'nullable',
            'role' => 'required|string|max:50', 
        ]);

        
        $validasiData['password'] = Hash::make($validasiData['password']);

        

        Pegawai::create($validasiData);

        // dd($validasiData);

        return redirect('/kabid/akun')->with('success', 'Data berhasil disimpan.');
    }

    public function editAkun($id) {
        $akun = Pegawai::where('id', $id)->get();    

        return view('kabid.akun.edit', compact('akun'));
    }

    public function updateAkun(Request $request, $id) {

        $validasiData = $request->validate([
            'name' => 'required|string|max:50', 
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:50', 
            'jenis_kelamin' => 'nullable',
            'role' => 'required|string|max:50', 
        ]);

        
        $validasiData['password'] = Hash::make($validasiData['password']);

        Pegawai::where('id', $id)-> update($validasiData);

        return redirect('/kabid/akun')->with('success', 'Data berhasil diedit');
    }

    public function deleteAkun($id) {
        Pegawai::destroy($id);
        return redirect('/kabid/akun')->with('status', 'Data berhasil dihapus.');
    }















    public function indexAdministrasi(){
        $administrasi = Administrasi::all();
        $data = DB::table('administrasis')
            ->join('lamarans', 'administrasis.id_lamaran', '=', 'lamarans.id')
            ->join('users', 'administrasis.id_user', '=', 'users.id')
            ->select('administrasis.*', 'lamarans.tanggal_lamaran', 'users.nik', 'users.name')
            ->get();
        
        return view('kabid.administrasi.index', compact('data'));
    }

    public function createAdministrasi(){
        $lamaran = Lamaran::all();
        $pelamar = User::all();

        return view('kabid.administrasi.create', compact('lamaran', 'pelamar'));
    }

    public function storeAdministrasi(Request $request){
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_user' => 'required',
            'kelengkapan' => 'required|integer',
            'kerapihan' => 'required|integer',
            'nilai_ijazah' => 'required|integer',
        ]);

        $kelengkapan = $request->input('kelengkapan');
        $kerapihan = $request->input('kerapihan');
        $nilai_ijazah = $request->input('nilai_ijazah');

        // Nilai Asli Kelengkapan
        if($kelengkapan >= 90 && $kelengkapan <= 100){
            $nilaiasli_kelengkapan = 5;
        }else if($kelengkapan >= 80){
            $nilaiasli_kelengkapan = 4;
        }else if($kelengkapan >= 70){
            $nilaiasli_kelengkapan = 3;
        }else if($kelengkapan >= 60){
            $nilaiasli_kelengkapan = 2;
        }else if($kelengkapan >= 50){
            $nilaiasli_kelengkapan = 1;
        }

        // Nilai Asli Kerapihan
        if($kerapihan >= 90 && $kerapihan <= 100){
            $nilaiasli_kerapihan = 5;
        }else if($kerapihan >= 80){
            $nilaiasli_kerapihan = 4;
        }else if($kerapihan >= 70){
            $nilaiasli_kerapihan = 3;
        }else if($kerapihan >= 60){
            $nilaiasli_kerapihan = 2;
        }else if($kerapihan >= 50){
            $nilaiasli_kerapihan = 1;
        }
        
         // Nilai Asli Ijazah
         if($nilai_ijazah >= 90 && $nilai_ijazah <= 100){
            $nilaiasli_ijazah = 5;
        }else if($nilai_ijazah >= 80){
            $nilaiasli_ijazah = 4;
        }else if($nilai_ijazah >= 70){
            $nilaiasli_ijazah = 3;
        }else if($nilai_ijazah >= 60){
            $nilaiasli_ijazah = 2;
        }else if($nilai_ijazah >= 50){
            $nilaiasli_ijazah = 1;
        }

        // Nilai Selisih

        $nilaiselisih_kelengkapan = $nilaiasli_kelengkapan - 4;
        $nilaiselisih_kerapihan = $nilaiasli_kerapihan - 5;
        $nilaiselisih_ijazah = $nilaiasli_ijazah - 3;



// Tabel Bobot
        $bobot_tabel = array(
            0 => 5,
    1 => 4.5,
    -1 => 4,
    2 => 3.5,
    -2 => 3,
    3 => 2.5,
    -3 => 2,
    4 => 1.5,
    -4 => 1
);

// Nilai Bobot
$bobot_kelengkapan = isset($bobot_tabel[$nilaiselisih_kelengkapan]) ? $bobot_tabel[$nilaiselisih_kelengkapan] : 0;
$bobot_kerapihan = isset($bobot_tabel[$nilaiselisih_kerapihan]) ? $bobot_tabel[$nilaiselisih_kerapihan] : 0;
$bobot_ijazah = isset($bobot_tabel[$nilaiselisih_ijazah]) ? $bobot_tabel[$nilaiselisih_ijazah] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
        
      // Perhitungan CF dan SF
$nilai_cf = ($bobot_kerapihan + $bobot_ijazah) / 2;
$nilai_sf = $bobot_kelengkapan;

// Perhitungan Total
$totaladministrasi = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

// Simpan perhitungan nilai asli
$validasiData['nilaiasli_kelengkapan'] = $nilaiasli_kelengkapan;
$validasiData['nilaiasli_kerapihan'] = $nilaiasli_kerapihan;
$validasiData['nilaiasli_ijazah'] = $nilaiasli_ijazah;

// Simpan perhitungan nilai bobot
$validasiData['nilaibobot_kelengkapan'] = $bobot_kelengkapan;
$validasiData['nilaibobot_kerapihan'] = $bobot_kerapihan;
$validasiData['nilaibobot_ijazah'] = $bobot_ijazah;



// Simpan perhiungan cf,sg, dan total
$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totaladministrasi;


        // $administrasi = new Administrasi($validasiData);
   
     
        // $administrasi->save();
        // // $lowongan->tutupLowongan();


        Administrasi::create($validasiData);

        return redirect('/kabid/administrasi')->with('status', 'Data berhasil ditambah.');
    }

    public function editAdministrasi($id) {
            $lamaran = Lamaran::all();
            $lamaranCount = Lamaran::all()->count();
            $pelamar = User::all();
            $pelamarCount = User::all()->count();
            $user = Administrasi::where('id', $id)->get();    
    
            return view('kabid.administrasi.edit', compact('lamaran', 'lamaranCount', 'pelamar', 'pelamarCount', 'user'));
    }

    public function updateAdministrasi(Request $request, $id) {
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_user' => 'required',
            'kelengkapan' => 'required|integer',
            'kerapihan' => 'required|integer',
            'nilai_ijazah' => 'required|integer',
        ]);

        $kelengkapan = $request->input('kelengkapan');
        $kerapihan = $request->input('kerapihan');
        $nilai_ijazah = $request->input('nilai_ijazah');

        // Nilai Asli Kelengkapan
        if($kelengkapan >= 90 && $kelengkapan <= 100){
            $nilaiasli_kelengkapan = 5;
        }else if($kelengkapan >= 80){
            $nilaiasli_kelengkapan = 4;
        }else if($kelengkapan >= 70){
            $nilaiasli_kelengkapan = 3;
        }else if($kelengkapan >= 60){
            $nilaiasli_kelengkapan = 2;
        }else if($kelengkapan >= 50){
            $nilaiasli_kelengkapan = 1;
        }

        // Nilai Asli Kerapihan
        if($kerapihan >= 90 && $kerapihan <= 100){
            $nilaiasli_kerapihan = 5;
        }else if($kerapihan >= 80){
            $nilaiasli_kerapihan = 4;
        }else if($kerapihan >= 70){
            $nilaiasli_kerapihan = 3;
        }else if($kerapihan >= 60){
            $nilaiasli_kerapihan = 2;
        }else if($kerapihan >= 50){
            $nilaiasli_kerapihan = 1;
        }
        
         // Nilai Asli Ijazah
         if($nilai_ijazah >= 90 && $nilai_ijazah <= 100){
            $nilaiasli_ijazah = 5;
        }else if($nilai_ijazah >= 80){
            $nilaiasli_ijazah = 4;
        }else if($nilai_ijazah >= 70){
            $nilaiasli_ijazah = 3;
        }else if($nilai_ijazah >= 60){
            $nilaiasli_ijazah = 2;
        }else if($nilai_ijazah >= 50){
            $nilaiasli_ijazah = 1;
        }

        // Nilai Selisih

        $nilaiselisih_kelengkapan = $nilaiasli_kelengkapan - 4;
        $nilaiselisih_kerapihan = $nilaiasli_kerapihan - 5;
        $nilaiselisih_ijazah = $nilaiasli_ijazah - 3;



// Tabel Bobot
        $bobot_tabel = array(
            0 => 5,
    1 => 4.5,
    -1 => 4,
    2 => 3.5,
    -2 => 3,
    3 => 2.5,
    -3 => 2,
    4 => 1.5,
    -4 => 1
);

// Nilai Bobot
$bobot_kelengkapan = isset($bobot_tabel[$nilaiselisih_kelengkapan]) ? $bobot_tabel[$nilaiselisih_kelengkapan] : 0;
$bobot_kerapihan = isset($bobot_tabel[$nilaiselisih_kerapihan]) ? $bobot_tabel[$nilaiselisih_kerapihan] : 0;
$bobot_ijazah = isset($bobot_tabel[$nilaiselisih_ijazah]) ? $bobot_tabel[$nilaiselisih_ijazah] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
        
      // Perhitungan CF dan SF
$nilai_cf = ($bobot_kerapihan + $bobot_ijazah) / 2;
$nilai_sf = $bobot_kelengkapan;

// Perhitungan Total
$totaladministrasi = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);


// Simpan perhitungan nilai asli
$validasiData['nilaiasli_kelengkapan'] = $nilaiasli_kelengkapan;
$validasiData['nilaiasli_kerapihan'] = $nilaiasli_kerapihan;
$validasiData['nilaiasli_ijazah'] = $nilaiasli_ijazah;

// Simpan perhitungan nilai bobot
$validasiData['nilaibobot_kelengkapan'] = $bobot_kelengkapan;
$validasiData['nilaibobot_kerapihan'] = $bobot_kerapihan;
$validasiData['nilaibobot_ijazah'] = $bobot_ijazah;

$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totaladministrasi;


        // $administrasi = new Administrasi($validasiData);
   
     
        // $administrasi->save();
        // // $lowongan->tutupLowongan();

        Administrasi::where('id', $id)->update($validasiData);

        return redirect('/kabid/administrasi')->with('status', 'Data berhasil diubah.');
    }

    public function deleteAdministrasi($id) {
        Administrasi::destroy($id);
        return redirect('/kabid/administrasi')->with('status', 'Data berhasil dihapus.');
    }

    // End Administrasi



    public function indexJadwalKeterampilan(){
        // $administrasi = Administrasi::all();
        $jadwal_keterampilan = JadwalKeterampilan::all();
        $data = DB::table('jadwal_keterampilans')
            ->join('users', 'jadwal_keterampilans.id_user', '=', 'users.id')
            ->join('lamarans', 'jadwal_keterampilans.id_lamaran', '=', 'lamarans.id')
            ->select('jadwal_keterampilans.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran')
            ->get();
        
        return view('kabid.jadwal_keterampilan.index', compact('data'));
    }

    public function createJadwalKeterampilan(){
        $lamaran = Lamaran::all();
        $pelamar = User::all();


        return view('kabid.jadwal_keterampilan.create', compact('lamaran', 'pelamar'));
    }

    public function storeJadwalKeterampilan(Request $request){
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_user' => 'required',
            'tanggal_tes' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
        ]);

     
        $keterampilan = new JadwalKeterampilan($validasiData);
   
     
        $keterampilan->save();
        // $lowongan->tutupLowongan();


        // Lowongan::create($validasiData);

        return redirect('/kabid/jadwal_keterampilan')->with('status', 'Data berhasil disimpan.');
    }

    public function editJadwalKeterampilan($id) {
        $lamaranCount = Lamaran::all()->count();
        $pelamarCount = User::all()->count();
    $lamaran = Lamaran::all();
    $pelamar = User::all();
    $data = JadwalKeterampilan::where('id', $id)->get();

    return view('kabid.jadwal_keterampilan.edit', compact('lamaran', 'lamaranCount','pelamar', 'pelamarCount', 'data'));
    }


    public function updateJadwalKeterampilan(Request $request, $id){
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_user' => 'required',
            'tanggal_tes' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
        ]);

     
       JadwalKeterampilan::where('id', $id)->update($validasiData);

       return redirect('/kabid/jadwal_keterampilan');
    }

    public function deleteJadwalKeterampilan($id) {
        JadwalKeterampilan::destroy($id);
        return redirect('/kabid/jadwal_keterampilan')->with('status', 'Data berhasil dihapus.');
    }


    public function indexKeterampilan(){
        // $administrasi = Administrasi::all();
        $keterampilan = Keterampilan::all();
        $data = DB::table('keterampilans')
            ->join('users', 'keterampilans.id_user', '=', 'users.id')
            ->join('lamarans', 'keterampilans.id_lamaran', '=', 'lamarans.id')
            ->join('jadwal_keterampilans', 'keterampilans.id_jadwalKeterampilan', '=', 'jadwal_keterampilans.id')
            ->select('keterampilans.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran', 'jadwal_keterampilans.tanggal_tes')
            ->get();
        
        return view('kabid.keterampilan.index', compact('keterampilan', 'data'));
    }

    public function createKeterampilan(){
        $lamaran = Lamaran::all();
        $jadwalKeterampilan = JadwalKeterampilan::all();
        $pelamar = User::all();


        return view('kabid.keterampilan.create', compact('lamaran', 'jadwalKeterampilan' ,'pelamar'));
    }

    public function storeKeterampilan(Request $request){
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_jadwalKeterampilan' => 'required',
            'id_user' => 'required',
            'psikotes' => 'required',
            'ketangkasan' => 'required',
        ]);

        $psikotes = $request->input('psikotes');
        $ketangkasan = $request->input('ketangkasan');

        
       // Nilai Asli Kelengkapan
       if($psikotes >= 90 && $psikotes <= 100){
        $nilaiasli_psikotes = 5;
        }else if($psikotes >= 80){
        $nilaiasli_psikotes = 4;
        }else if($psikotes >= 70){
        $nilaiasli_psikotes = 3;
        }else if($psikotes >= 60){
        $nilaiasli_psikotes = 2;
        }else if($psikotes >= 50){
        $nilaiasli_psikotes = 1;
    }

    // Nilai Asli Kerapihan
    if($ketangkasan >= 90 && $ketangkasan <= 100){
        $nilaiasli_ketangkasan = 5;
    }else if($ketangkasan >= 80){
        $nilaiasli_ketangkasan = 4;
    }else if($ketangkasan >= 70){
        $nilaiasli_ketangkasan = 3;
    }else if($ketangkasan >= 60){
        $nilaiasli_ketangkasan = 2;
    }else if($ketangkasan >= 50){
        $nilaiasli_ketangkasan = 1;
    }
    // Nilai Selisih

    $nilaiselisih_psikotes = $nilaiasli_psikotes - 3;
    $nilaiselisih_ketangkasan = $nilaiasli_ketangkasan - 4;



// Tabel Bobot
    $bobot_tabel = array(
        0 => 5,
1 => 4.5,
-1 => 4,
2 => 3.5,
-2 => 3,
3 => 2.5,
-3 => 2,
4 => 1.5,
-4 => 1
);

// Nilai Bobot
$bobot_psikotes = isset($bobot_tabel[$nilaiselisih_psikotes]) ? $bobot_tabel[$nilaiselisih_psikotes] : 0;
$bobot_ketangkasan = isset($bobot_tabel[$nilaiselisih_ketangkasan]) ? $bobot_tabel[$nilaiselisih_ketangkasan] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
    
  // Perhitungan CF dan SF
$nilai_cf = $bobot_psikotes;
$nilai_sf = $bobot_ketangkasan;

// Perhitungan Total
$totalketerampilan = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

//Simpan Nilai asli
$validasiData['nilaiasli_psikotes'] = $nilaiasli_psikotes;
$validasiData['nilaiasli_ketangkasan'] = $nilaiasli_ketangkasan;

//Simpan Nilai asli
$validasiData['nilaibobot_psikotes'] = $bobot_psikotes;
$validasiData['nilaibobot_ketangkasan'] = $bobot_ketangkasan;


//Simpan nilai total
$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totalketerampilan;


    // $administrasi = new Administrasi($validasiData);

 
    // $administrasi->save();
    // // $lowongan->tutupLowongan();


    Keterampilan::create($validasiData);
       
    


        // Lowongan::create($validasiData);

        return redirect('/kabid/keterampilan')->with('status', 'Data berhasil disimpan.');
    }

    public function editKeterampilan($id) {
            $lamaranCount = Lamaran::all()->count();
            $pelamarCount = User::all()->count();
        $lamaran = Lamaran::all();
        $jadwalKeterampilan = JadwalKeterampilan::all();
        $jadwalKeterampilanCount = JadwalKeterampilan::all()->count();
        $pelamar = User::all();
        $data = Keterampilan::where('id', $id)->get();

        return view('kabid.keterampilan.edit', compact('lamaran', 'lamaranCount', 'jadwalKeterampilan', 'jadwalKeterampilanCount' ,'pelamar', 'pelamarCount', 'data'));
    }

    public function updateKeterampilan(Request $request, $id) {
        $validasiData = $request->validate([
            'id_lamaran' => 'required',
            'id_jadwalKeterampilan' => 'required',
            'id_user' => 'required',
            'psikotes' => 'required',
            'ketangkasan' => 'required',
        ]);

        $psikotes = $request->input('psikotes');
        $ketangkasan = $request->input('ketangkasan');

        
       // Nilai Asli Kelengkapan
       if($psikotes >= 90 && $psikotes <= 100){
        $nilaiasli_psikotes = 5;
        }else if($psikotes >= 80){
        $nilaiasli_psikotes = 4;
        }else if($psikotes >= 70){
        $nilaiasli_psikotes = 3;
        }else if($psikotes >= 60){
        $nilaiasli_psikotes = 2;
        }else if($psikotes >= 50){
        $nilaiasli_psikotes = 1;
    }

    // Nilai Asli Kerapihan
    if($ketangkasan >= 90 && $ketangkasan <= 100){
        $nilaiasli_ketangkasan = 5;
    }else if($ketangkasan >= 80){
        $nilaiasli_ketangkasan = 4;
    }else if($ketangkasan >= 70){
        $nilaiasli_ketangkasan = 3;
    }else if($ketangkasan >= 60){
        $nilaiasli_ketangkasan = 2;
    }else if($ketangkasan >= 50){
        $nilaiasli_ketangkasan = 1;
    }
    // Nilai Selisih

    $nilaiselisih_psikotes = $nilaiasli_psikotes - 3;
    $nilaiselisih_ketangkasan = $nilaiasli_ketangkasan - 4;



// Tabel Bobot
    $bobot_tabel = array(
        0 => 5,
1 => 4.5,
-1 => 4,
2 => 3.5,
-2 => 3,
3 => 2.5,
-3 => 2,
4 => 1.5,
-4 => 1
);

// Nilai Bobot
$bobot_psikotes = isset($bobot_tabel[$nilaiselisih_psikotes]) ? $bobot_tabel[$nilaiselisih_psikotes] : 0;
$bobot_ketangkasan = isset($bobot_tabel[$nilaiselisih_ketangkasan]) ? $bobot_tabel[$nilaiselisih_ketangkasan] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
    
  // Perhitungan CF dan SF
$nilai_cf = $bobot_psikotes;
$nilai_sf = $bobot_ketangkasan;

// Perhitungan Total
$totalketerampilan = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

//Simpan Nilai asli
$validasiData['nilaiasli_psikotes'] = $nilaiasli_psikotes;
$validasiData['nilaiasli_ketangkasan'] = $nilaiasli_ketangkasan;

//Simpan Nilai asli
$validasiData['nilaibobot_psikotes'] = $bobot_psikotes;
$validasiData['nilaibobot_ketangkasan'] = $bobot_ketangkasan;

$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totalketerampilan;


    // $administrasi = new Administrasi($validasiData);

 
    // $administrasi->save();
    // // $lowongan->tutupLowongan();


        Keterampilan::where('id', $id)-> update($validasiData);

        return redirect('/kabid/keterampilan')->with('status', 'Data berhasil diubah.');
    }

        public function indexJadwalWawancara(){
            // $administrasi = Administrasi::all();
            $jadwal_wawancara = JadwalWawancara::all();
            $data = DB::table('jadwal_wawancaras')
            ->join('users', 'jadwal_wawancaras.id_user', '=', 'users.id')
            ->join('lamarans', 'jadwal_wawancaras.id_lamaran', '=', 'lamarans.id')
            ->select('jadwal_wawancaras.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran')
            ->get();
            
            return view('kabid.jadwal_wawancara.index', compact('jadwal_wawancara', 'data'));
        }
    
        public function createJadwalWawancara(){
            $lamaran = Lamaran::all();
            $pelamar = User::all();
    
    
            return view('kabid.jadwal_wawancara.create', compact('lamaran', 'pelamar'));
        }
    
        public function storeJadwalWawancara(Request $request){
            $validasiData = $request->validate([
                'id_lamaran' => 'required',
                'id_user' => 'required',
                'tanggal_tes' => 'required',
                'jam' => 'required',
                'lokasi' => 'required',
            ]);
    
         
            $wawancara = new JadwalWawancara($validasiData);
       
         
            $wawancara->save();
            // $lowongan->tutupLowongan();
    
    
            // Lowongan::create($validasiData);
    
            return redirect('/kabid/jadwal_wawancara')->with('status', 'Data berhasil disimpan.');
        }

        public function editJadwalWawancara($id) {
            $lamaranCount = Lamaran::all()->count();
            $pelamarCount = User::all()->count();
        $lamaran = Lamaran::all();
        $pelamar = User::all();
        $data = JadwalWawancara::where('id', $id)->get();
    
        return view('kabid.jadwal_wawancara.edit', compact('lamaran', 'lamaranCount','pelamar', 'pelamarCount', 'data'));
        }
    
    
        public function updateJadwalWawancara(Request $request, $id){
            $validasiData = $request->validate([
                'id_lamaran' => 'required',
                'id_user' => 'required',
                'tanggal_tes' => 'required',
                'jam' => 'required',
                'lokasi' => 'required',
            ]);
    
         
           JadwalWawancara::where('id', $id)->update($validasiData);
    
           return redirect('/kabid/jadwal_wawancara');
        }

        public function deleteJadwalWawancara($id) {
            JadwalWawancara::destroy($id);
            return redirect('/kabid/jadwal_wawancara')->with('status', 'Data berhasil dihapus.');
        }
    
    
        public function indexWawancara(){
            // $administrasi = Administrasi::all();
            $wawancara = Wawancara::all();
            $data = DB::table('wawancaras')
            ->join('users', 'wawancaras.id_user', '=', 'users.id')
            ->join('lamarans', 'wawancaras.id_lamaran', '=', 'lamarans.id')
            ->join('jadwal_wawancaras', 'wawancaras.id_jadwalWawancara', '=', 'jadwal_wawancaras.id')
            ->select('wawancaras.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran', 'jadwal_wawancaras.tanggal_tes')
            ->get();
            
            return view('kabid.wawancara.index', compact('wawancara', 'data'));
        }
    
        public function createWawancara(){
            $lamaran = Lamaran::all();
            $jadwal_wawancara = JadwalWawancara::all();
            $pelamar = User::all();
    
    
            return view('kabid.wawancara.create', compact('lamaran', 'jadwal_wawancara' ,'pelamar'));
        }
    
        public function storeWawancara(Request $request){
            $validasiData = $request->validate([
                'id_lamaran' => 'required',
                'id_jadwalWawancara' => 'required',
                'id_user' => 'required',
                'ketegasan' => 'required',
                'atitude' => 'required',
                'grooming' => 'required'
            ]);
    
            $ketegasan = $request->input('ketegasan');
            $atitude = $request->input('atitude');
            $grooming = $request->input('grooming');
            
          // Nilai Asli Kelengkapan
       if($ketegasan >= 90 && $ketegasan <= 100){
        $nilaiasli_ketegasan = 5;
        }else if($ketegasan >= 80){
        $nilaiasli_ketegasan = 4;
        }else if($ketegasan >= 70){
        $nilaiasli_ketegasan = 3;
        }else if($ketegasan >= 60){
        $nilaiasli_ketegasan = 2;
        }else if($ketegasan >= 50){
        $nilaiasli_ketegasan = 1;
    }

    // Nilai Asli Kerapihan
    if($atitude >= 90 && $atitude <= 100){
        $nilaiasli_atitude = 5;
    }else if($atitude >= 80){
        $nilaiasli_atitude = 4;
    }else if($atitude >= 70){
        $nilaiasli_atitude = 3;
    }else if($atitude >= 60){
        $nilaiasli_atitude = 2;
    }else if($atitude >= 50){
        $nilaiasli_atitude = 1;
    }
    // Nilai Asli Kerapihan
    if($grooming >= 90 && $grooming <= 100){
        $nilaiasli_grooming = 5;
    }else if($grooming >= 80){
        $nilaiasli_grooming = 4;
    }else if($grooming >= 70){
        $nilaiasli_grooming = 3;
    }else if($grooming >= 60){
        $nilaiasli_grooming = 2;
    }else if($grooming >= 50){
        $nilaiasli_grooming = 1;
    }
    // Nilai Selisih

    $nilaiselisih_ketegasan = $nilaiasli_ketegasan - 4;
    $nilaiselisih_atitude = $nilaiasli_atitude - 5;
    $nilaiselisih_grooming = $nilaiasli_grooming - 4;



// Tabel Bobot
    $bobot_tabel = array(
        0 => 5,
1 => 4.5,
-1 => 4,
2 => 3.5,
-2 => 3,
3 => 2.5,
-3 => 2,
4 => 1.5,
-4 => 1
);

// Nilai Bobot
$bobot_ketegasan = isset($bobot_tabel[$nilaiselisih_ketegasan]) ? $bobot_tabel[$nilaiselisih_ketegasan] : 0;
$bobot_atitude = isset($bobot_tabel[$nilaiselisih_atitude]) ? $bobot_tabel[$nilaiselisih_atitude] : 0;
$bobot_grooming = isset($bobot_tabel[$nilaiselisih_grooming]) ? $bobot_tabel[$nilaiselisih_grooming] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
    
  // Perhitungan CF dan SF
$nilai_cf = ($bobot_ketegasan + $bobot_atitude) / 2;
$nilai_sf = $bobot_grooming;

// Perhitungan Total
$totalketerampilan = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

// Nilai Asli
$validasiData['nilaiasli_ketegasan'] = $nilaiasli_ketegasan;
$validasiData['nilaiasli_atitude'] = $nilaiasli_atitude;
$validasiData['nilaiasli_grooming'] = $nilaiasli_grooming;

// Nilai Bobot
$validasiData['nilaibobot_ketegasan'] = $nilaiasli_ketegasan;
$validasiData['nilaibobot_atitude'] = $nilaiasli_atitude;
$validasiData['nilaibobot_grooming'] = $nilaiasli_grooming;

$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totalketerampilan;


    // $administrasi = new Administrasi($validasiData);

 
    // $administrasi->save();
    // // $lowongan->tutupLowongan();


    Wawancara::create($validasiData);
    
            // Lowongan::create($validasiData);
    
            return redirect('/kabid/wawancara')->with('status', 'Data berhasil disimpan.');
        }

        public function editWawancara($id) {
            $lamaranCount = Lamaran::all()->count();
            $lamaran = Lamaran::all();
            $pelamarCount = User::all()->count();
            $pelamar = User::all();
            $jadwalWawancaraCount = JadwalWawancara::all()->count();
            $jadwalWawancara = JadwalWawancara::all();
            $data = Wawancara::where('id', $id)->get();

            return view('kabid.wawancara.edit', compact('lamaran', 'lamaranCount', 'jadwalWawancara', 'jadwalWawancaraCount' ,'pelamar', 'pelamarCount', 'data'));
        }

        public function updateWawancara(Request $request, $id) {

            $validasiData = $request->validate([
                'id_lamaran' => 'required',
                'id_jadwalWawancara' => 'required',
                'id_user' => 'required',
                'ketegasan' => 'required',
                'atitude' => 'required',
                'grooming' => 'required'
            ]);

        
    
            $ketegasan = $request->input('ketegasan');
            $atitude = $request->input('atitude');
            $grooming = $request->input('grooming');
            
          // Nilai Asli Kelengkapan
       if($ketegasan >= 90 && $ketegasan <= 100){
        $nilaiasli_ketegasan = 5;
        }else if($ketegasan >= 80){
        $nilaiasli_ketegasan = 4;
        }else if($ketegasan >= 70){
        $nilaiasli_ketegasan = 3;
        }else if($ketegasan >= 60){
        $nilaiasli_ketegasan = 2;
        }else if($ketegasan >= 50){
        $nilaiasli_ketegasan = 1;
    }

    // Nilai Asli Kerapihan
    if($atitude >= 90 && $atitude <= 100){
        $nilaiasli_atitude = 5;
    }else if($atitude >= 80){
        $nilaiasli_atitude = 4;
    }else if($atitude >= 70){
        $nilaiasli_atitude = 3;
    }else if($atitude >= 60){
        $nilaiasli_atitude = 2;
    }else if($atitude >= 50){
        $nilaiasli_atitude = 1;
    }
    // Nilai Asli Kerapihan
    if($grooming >= 90 && $grooming <= 100){
        $nilaiasli_grooming = 5;
    }else if($grooming >= 80){
        $nilaiasli_grooming = 4;
    }else if($grooming >= 70){
        $nilaiasli_grooming = 3;
    }else if($grooming >= 60){
        $nilaiasli_grooming = 2;
    }else if($grooming >= 50){
        $nilaiasli_grooming = 1;
    }
    // Nilai Selisih

    $nilaiselisih_ketegasan = $nilaiasli_ketegasan - 4;
    $nilaiselisih_atitude = $nilaiasli_atitude - 5;
    $nilaiselisih_grooming = $nilaiasli_grooming - 4;



// Tabel Bobot
    $bobot_tabel = array(
        0 => 5,
1 => 4.5,
-1 => 4,
2 => 3.5,
-2 => 3,
3 => 2.5,
-3 => 2,
4 => 1.5,
-4 => 1
);

// Nilai Bobot
$bobot_ketegasan = isset($bobot_tabel[$nilaiselisih_ketegasan]) ? $bobot_tabel[$nilaiselisih_ketegasan] : 0;
$bobot_atitude = isset($bobot_tabel[$nilaiselisih_atitude]) ? $bobot_tabel[$nilaiselisih_atitude] : 0;
$bobot_grooming = isset($bobot_tabel[$nilaiselisih_grooming]) ? $bobot_tabel[$nilaiselisih_grooming] : 0;

// echo "Bobot Kelengkapan: " . $bobot_kelengkapan . "<br>";
// echo "Bobot Kerapihan: " . $bobot_kerapihan . "<br>";
// echo "Bobot Ijazah: " . $bobot_ijazah . "<br>";
    
  // Perhitungan CF dan SF
$nilai_cf = ($bobot_ketegasan + $bobot_atitude) / 2;
$nilai_sf = $bobot_grooming;

// Perhitungan Total
$totalketerampilan = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

// Nilai Asli
$validasiData['nilaiasli_ketegasan'] = $nilaiasli_ketegasan;
$validasiData['nilaiasli_atitude'] = $nilaiasli_atitude;
$validasiData['nilaiasli_grooming'] = $nilaiasli_grooming;

// Nilai Bobot
$validasiData['nilaibobot_ketegasan'] = $nilaiasli_ketegasan;
$validasiData['nilaibobot_atitude'] = $nilaiasli_atitude;
$validasiData['nilaibobot_grooming'] = $nilaiasli_grooming;

$validasiData['cf'] = $nilai_cf;
$validasiData['sf'] = $nilai_sf;
$validasiData['total'] = $totalketerampilan;


    // $administrasi = new Administrasi($validasiData);

 
    // $administrasi->save();
    // // $lowongan->tutupLowongan();



        Wawancara::where('id', $id)-> update($validasiData);

        return redirect('/kabid/wawancara')->with('status', 'Data berhasil diubah.');

        }

        public function deleteWawancara($id) {
            Wawancara::destroy($id);
            return redirect('/kabid/wawancara')->with('status', 'Data berhasil dihapus.');
        }

        public function peringkat(){
            $peringkat = DB::table('users')
            ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
            ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
            ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
            ->select('users.name', 'users.no_telpon', 'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara' )
            ->get();
            $peringkatCount = DB::table('users')
            ->join('administrasis', 'users.id', '=', 'administrasis.id_user')
            ->join('keterampilans', 'users.id', '=', 'keterampilans.id_user')
            ->join('wawancaras', 'users.id', '=', 'wawancaras.id_user')
            ->select('users.name', 'users.no_telpon', 'administrasis.total AS total_admin', 'keterampilans.total AS total_terampil', 'wawancaras.total AS total_wawancara' )
            ->count();

            $userCount = User::count();

            $arrayKosong = array();

            foreach($peringkat as $item) {
                $name = $item->name;
                $no_telpon = $item->no_telpon;
                $total_admin = $item->total_admin;
                $total_terampil = $item->total_terampil;
                $total_wawancara = $item->total_wawancara;
                $total_semua = 0.3 * $total_admin + 0.4 * $total_terampil + 0.3 * $total_wawancara;

                $result = [
                    'name' => $name,
                    'no_telpon' => $no_telpon,
                    'total_admin' => $total_admin,
                    'total_terampil' => $total_terampil,
                    'total_wawancara' => $total_wawancara,
                    'total_semua' => $total_semua,
                ];

                array_push($arrayKosong, $result);
            }

            $sort = collect($arrayKosong)->sortByDesc('total_semua')->values()->all();
            // $peringkat = Peringkat::join('users', 'peringkat.id', '=', 'users.id')
            //     ->join('wawancara', 'peringkat.id', '=', 'wawancara.id')
            //     ->join('keterampilan', 'peringkat.id', '=', 'keterampilan.id')
            //     ->join('administrasi', 'peringkat.id', '=', 'administrasi.id')
            //     ->select(
            //         'peringkat.id',
            //         'user.name',
            //         'user.no_telpon',
            //         'wawancara.total',
            //         'keterampilan.total',
            //         'administrasi.total'
            //     )
            //     ->get();

            return view('kabid.peringkat.index', compact('sort', 'peringkatCount'));
        }
}
