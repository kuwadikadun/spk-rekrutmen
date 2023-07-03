<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\JadwalKeterampilan;
use App\Models\JadwalWawancara;
use App\Models\Keterampilan;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Peringkat;
use App\Models\User;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $lowongan = Lowongan::all();

        return view('admin.dashboard',compact('lowongan'));
    }


    public function indexLowongan(){
        $lowongan = Lowongan::all();

        return view('admin.lowongan.index',compact('lowongan'));
    }


    public function createLowongan(){
        return view('admin.lowongan.create');
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

        return redirect('/admin/lowongan')->with('status', 'Data berhasil ditambah.');
    }

    public function editLowongan($id){
        $lowongan = Lowongan::where('id', $id)->first();

        return view('admin.lowongan.edit', compact('lowongan'));
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

        return redirect('/admin/lowongan')->with('status', 'Data berhasil diubah.');
    }

    public function deleteLowongan($id) {
        Lowongan::destroy($id);
        return redirect('/admin/lowongan')->with('status', 'Data berhasil dihapus.');
    }

    // End Lowongan



    public function indexAdministrasi(){
        $administrasi = Administrasi::all();
        $data = DB::table('administrasis')
            ->join('lamarans', 'administrasis.id_lamaran', '=', 'lamarans.id')
            ->join('users', 'administrasis.id_user', '=', 'users.id')
            ->select('administrasis.*', 'lamarans.tanggal_lamaran', 'users.nik', 'users.name')
            ->get();
        
        return view('admin.administrasi.index', compact('data'));
    }

    public function createAdministrasi(){
        $lamaran = Lamaran::all();
        $pelamar = User::all();

        return view('admin.administrasi.create', compact('lamaran', 'pelamar'));
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
        
        $total = $kelengkapan + $kerapihan + $nilai_ijazah;

        $validasiData['total'] = $total;
        $administrasi = new Administrasi($validasiData);
   
     
        $administrasi->save();
        // $lowongan->tutupLowongan();


        // Lowongan::create($validasiData);

        return redirect('/admin/administrasi')->with('status', 'Data berhasil ditambah.');
    }

    public function editAdministrasi($id) {
            $lamaran = Lamaran::all();
            $lamaranCount = Lamaran::all()->count();
            $pelamar = User::all();
            $pelamarCount = User::all()->count();
            $user = Administrasi::where('id', $id)->get();    
    
            return view('admin.administrasi.edit', compact('lamaran', 'lamaranCount', 'pelamar', 'pelamarCount', 'user'));
    }

    public function updateAdministrasi(Request $request, $id) {
        $kelengkapan = $request->input('kelengkapan');
        $kerapihan = $request->input('kerapihan');
        $nilai_ijazah = $request->input('nilai_ijazah');
        
        $total = $kelengkapan + $kerapihan + $nilai_ijazah;

        Administrasi::where('id', $id)->update([
            'id_lamaran' => $request->id_lamaran,
            'id_user' => $request->id_user,
            'kelengkapan' => $kelengkapan,
            'kerapihan' => $kerapihan,
            'nilai_ijazah' => $nilai_ijazah,
            'total' => $total,
        ]);

        return redirect('/admin/administrasi')->with('status', 'Data berhasil diubah.');
    }

    public function deleteAdministrasi($id) {
        Administrasi::destroy($id);
        return redirect('/admin/administrasi')->with('status', 'Data berhasil dihapus.');
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
        
        return view('admin.jadwal_keterampilan.index', compact('data'));
    }

    public function createJadwalKeterampilan(){
        $lamaran = Lamaran::all();
        $pelamar = User::all();


        return view('admin.jadwal_keterampilan.create', compact('lamaran', 'pelamar'));
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

        return redirect('/admin/jadwal_keterampilan')->with('status', 'Data berhasil disimpan.');
    }

    public function deleteJadwalKeterampilan($id) {
        JadwalKeterampilan::destroy($id);
        return redirect('/admin/jadwal_keterampilan')->with('status', 'Data berhasil dihapus.');
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
        
        return view('admin.keterampilan.index', compact('keterampilan', 'data'));
    }

    public function createKeterampilan(){
        $lamaran = Lamaran::all();
        $jadwalKeterampilan = JadwalKeterampilan::all();
        $pelamar = User::all();


        return view('admin.keterampilan.create', compact('lamaran', 'jadwalKeterampilan' ,'pelamar'));
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

        
        $total = $psikotes + $ketangkasan ;

        $validasiData['total'] = $total;
       
        $keterampilan = new Keterampilan($validasiData);
   
     
        $keterampilan->save();
        // $lowongan->tutupLowongan();


        // Lowongan::create($validasiData);

        return redirect('/admin/keterampilan')->with('status', 'Data berhasil disimpan.');
    }

    public function editKeterampilan($id) {
            $lamaranCount = Lamaran::all()->count();
            $pelamarCount = User::all()->count();
        $lamaran = Lamaran::all();
        $jadwalKeterampilan = JadwalKeterampilan::all();
        $jadwalKeterampilanCount = JadwalKeterampilan::all()->count();
        $pelamar = User::all();
        $data = Keterampilan::where('id', $id)->get();

        return view('admin.keterampilan.edit', compact('lamaran', 'lamaranCount', 'jadwalKeterampilan', 'jadwalKeterampilanCount' ,'pelamar', 'pelamarCount', 'data'));
    }

    public function updateKeterampilan(Request $request, $id) {
        $psikotes = $request->input('psikotes');
        $ketangkasan = $request->input('ketangkasan');

        $total = $psikotes + $ketangkasan ;

        Keterampilan::where('id', $id)-> update([
            'id_lamaran' => $request->id_lamaran,
            'id_jadwalKeterampilan' => $request->id_jadwalKeterampilan,
            'id_user' => $request->id_user,
            'psikotes' => $psikotes,
            'ketangkasan' => $ketangkasan,
            'total' => $total,
        ]);

        return redirect('/admin/keterampilan')->with('status', 'Data berhasil diubah.');
    }

        public function indexJadwalWawancara(){
            // $administrasi = Administrasi::all();
            $jadwal_wawancara = JadwalWawancara::all();
            $data = DB::table('jadwal_wawancaras')
            ->join('users', 'jadwal_wawancaras.id_user', '=', 'users.id')
            ->join('lamarans', 'jadwal_wawancaras.id_lamaran', '=', 'lamarans.id')
            ->select('jadwal_wawancaras.*', 'users.nik', 'users.name', 'lamarans.tanggal_lamaran')
            ->get();
            
            return view('admin.jadwal_wawancara.index', compact('jadwal_wawancara', 'data'));
        }
    
        public function createJadwalWawancara(){
            $lamaran = Lamaran::all();
            $pelamar = User::all();
    
    
            return view('admin.jadwal_wawancara.create', compact('lamaran', 'pelamar'));
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
    
            return redirect('/admin/jadwal_wawancara')->with('status', 'Data berhasil disimpan.');
        }

        public function deleteJadwalWawancara($id) {
            JadwalWawancara::destroy($id);
            return redirect('/admin/jadwal_wawancara')->with('status', 'Data berhasil dihapus.');
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
            
            return view('admin.wawancara.index', compact('wawancara', 'data'));
        }
    
        public function createWawancara(){
            $lamaran = Lamaran::all();
            $jadwal_wawancara = JadwalWawancara::all();
            $pelamar = User::all();
    
    
            return view('admin.wawancara.create', compact('lamaran', 'jadwal_wawancara' ,'pelamar'));
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
            
            $total = $ketegasan + $atitude + $grooming ;
    
            $validasiData['total'] = $total;
           
            $wawancara = new Wawancara($validasiData);
       
         
            $wawancara->save();
            // $lowongan->tutupLowongan();
    
    
            // Lowongan::create($validasiData);
    
            return redirect('/admin/wawancara')->with('status', 'Data berhasil disimpan.');
        }

        public function editWawancara($id) {
            $lamaranCount = Lamaran::all()->count();
            $lamaran = Lamaran::all();
            $pelamarCount = User::all()->count();
            $pelamar = User::all();
            $jadwalWawancaraCount = JadwalWawancara::all()->count();
            $jadwalWawancara = JadwalWawancara::all();
            $data = Wawancara::where('id', $id)->get();

            return view('admin.wawancara.edit', compact('lamaran', 'lamaranCount', 'jadwalWawancara', 'jadwalWawancaraCount' ,'pelamar', 'pelamarCount', 'data'));
        }

        public function updateWawancara(Request $request, $id) {

            $ketegasan = $request->input('ketegasan');
            $atitude = $request->input('atitude');
            $grooming = $request->input('grooming');
            
            $total = $ketegasan + $atitude + $grooming ;

        Wawancara::where('id', $id)-> update([
            'id_lamaran' => $request->id_lamaran,
            'id_jadwalWawancara' => $request->id_jadwalWawancara,
            'id_user' => $request->id_user,
            'ketegasan' => $request->ketegasan,
            'atitude' => $request->atitude,
            'grooming' => $request->grooming,
            'total' => $total,
        ]);

        return redirect('/admin/wawancara')->with('status', 'Data berhasil diubah.');

        }

        public function deleteWawancara($id) {
            Wawancara::destroy($id);
            return redirect('/admin/wawancara')->with('status', 'Data berhasil dihapus.');
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
                $total_semua = $total_admin + $total_terampil + $total_wawancara;

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

            return view('admin.peringkat.index', compact('sort', 'peringkatCount'));
        }
}
