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
        return view('admin.dashboard');
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
        $kerapihan = $request->input('kualifikasi');
        $nilai_ijazah = $request->input('nilai_ijazah');
        
        $total = $kelengkapan + $kerapihan + $nilai_ijazah;

        $validasiData['total'] = $total;
        $administrasi = new Administrasi($validasiData);
   
     
        $administrasi->save();
        // $lowongan->tutupLowongan();


        // Lowongan::create($validasiData);

        return redirect('/admin/administrasi')->with('status', 'Data berhasil ditambah.');
    }

    public function editAdministrasi() {
            $lamaran = Lamaran::all();
            $pelamar = User::all();
    
    
            return view('admin.administrasi.edit', compact('lamaran', 'pelamar'));
    }

    public function updateAdministrasi(Request $request, $id) {
        $kelengkapan = $request->input('kelengkapan');
        $kerapihan = $request->input('kualifikasi');
        $nilai_ijazah = $request->input('nilai_ijazah');
        
        $total = $kelengkapan + $kerapihan + $nilai_ijazah;

        Administrasi::where($id)->update([
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
        
        return view('admin.jadwal_keterampilan.index', compact('jadwal_keterampilan'));
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


    public function indexKeterampilan(){
        // $administrasi = Administrasi::all();
        $keterampilan = Keterampilan::all();
        
        return view('admin.keterampilan.index', compact('keterampilan'));
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

    public function peringkat(){
        $peringkat = Peringkat::join('user', 'peringkat.id', '=', 'user.id')
            ->join('wawancara', 'peringkat.id', '=', 'wawancara.id')
            ->join('keterampilan', 'peringkat.id', '=', 'keterampilan.id')
            ->join('administrasi', 'peringkat.id', '=', 'administrasi.id')
            ->select(
                'peringkat.id',
                'user.nama',
                'wawancara.total',
                'keterampilan.total',
                'administrasi.total'
            )
            ->get();
        }

        public function indexJadwalWawancara(){
            // $administrasi = Administrasi::all();
            $jadwal_wawancara = JadwalWawancara::all();
            
            return view('admin.jadwal_wawancara.index', compact('jadwal_wawancara'));
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
    
    
        public function indexWawancara(){
            // $administrasi = Administrasi::all();
            $wawancara = Wawancara::all();
            
            return view('admin.wawancara.index', compact('wawancara'));
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
}
