<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\PelamarLoginController::class, 'dashboard']);
Route::get('/login', [App\Http\Controllers\PelamarLoginController::class, 'showLogin']);
Route::post('/login/pelamar',  [App\Http\Controllers\PelamarLoginController::class, 'login']);
Route::post('/logout/pelamar', [App\Http\Controllers\PelamarLoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\PelamarLoginController::class, 'register']);
Route::post('/register/store', [App\Http\Controllers\PelamarLoginController::class, 'store']);



Route::get('/pegawai', [App\Http\Controllers\PegawaiLoginController::class, 'showLogin']);
Route::post('/login/pegawai',  [App\Http\Controllers\PegawaiLoginController::class, 'login']);
Route::post('/logout/pegawai', [App\Http\Controllers\PegawaiLoginController::class, 'logout']);
// Route::get('/', function () {
//     return view('user.dashboard');
// });

// Route::get('/profil', function () {
//     return view('user.profil');
// });

// Route::get('/kategori', function () {
//     return view('user.kategori');
// });

// Route::get('/pelamar', function () {
//     return view('admin.pelamar');
// });

// Route::get('/user', function () {
//     return view('admin.user');
// });

// Route::get('/tes_interview', function () {
//     return view('admin.interview');
//     // jadwal interview dan nilai
// });

// Route::get('/tes_bidang', function () {
//     return view('admin.bidang');
//     //jadwal tes bidang dan nilai
// });

// Route::get('/pelamar_diterima', function () {
//     return view('admin.pelamar-diterima');
//     // ranking, nama, telepon, email, nilai
// });







// User
Route::get('/pelamar', [App\Http\Controllers\PelamarController::class, 'dashboardLowongan']);
Route::get('/pelamar/dashboard', [App\Http\Controllers\PelamarController::class, 'dashboardLowongan']);
Route::get('/pelamar/lowongan', [App\Http\Controllers\PelamarController::class, 'indexLowongan']);
Route::get('/pelamar/lowongan/detail/{id}', [App\Http\Controllers\PelamarController::class, 'detailLowongan']);
Route::get('/pelamar/lowongan/{id}', [App\Http\Controllers\PelamarController::class, 'viewLowongan']);
Route::get('/pelamar/lowongan/lamaran/{id}', [App\Http\Controllers\PelamarController::class, 'createLamaran']);
Route::post('/pelamar/lowongan/store', [App\Http\Controllers\PelamarController::class, 'storeLamaran']);
Route::patch('/pelamar/lowongan/update/{id}', [App\Http\Controllers\PelamarController::class, 'updateLamaran']);
Route::delete('/pelamar/lowongan/delete/{id}', [App\Http\Controllers\PelamarController::class, 'deleteLowongan']);

Route::get('/pelamar/lamaran', [App\Http\Controllers\PelamarController::class, 'lamaran']);
Route::get('/pelamar/jadwal_wawancara', [App\Http\Controllers\PelamarController::class, 'JadwalWawancara']);
Route::get('/pelamar/jadwal_keterampilan', [App\Http\Controllers\PelamarController::class, 'JadwalKeterampilan']);
Route::get('/pelamar/keterampilan', [App\Http\Controllers\PelamarController::class, 'Keterampilan']);
Route::get('/pelamar/wawancara', [App\Http\Controllers\PelamarController::class, 'Wawancara']);
Route::get('/pelamar/peringkat', [App\Http\Controllers\PelamarController::class, 'peringkat']);


Route::get('/pelamar/profil', [App\Http\Controllers\PelamarController::class, 'index']);
Route::get('/pelamar/profil/edit/{id}', [App\Http\Controllers\PelamarController::class, 'editProfil']);
Route::patch('/pelamar/profil/update/{id}', [App\Http\Controllers\PelamarController::class, 'updateProfil']);





// Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard']);
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);


// Admin Lowongan
Route::get('/admin/lowongan', [App\Http\Controllers\AdminController::class, 'indexLowongan']);
Route::get('/admin/lowongan/create', [App\Http\Controllers\AdminController::class, 'createLowongan']);
Route::post('/admin/lowongan/store', [App\Http\Controllers\AdminController::class, 'storeLowongan']);
Route::get('/admin/lowongan/edit/{id}', [App\Http\Controllers\AdminController::class, 'editLowongan']);
Route::patch('/admin/lowongan/update/{id}', [App\Http\Controllers\AdminController::class, 'updateLowongan']);
Route::delete('/admin/lowongan/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteLowongan']);
// Route::get('/admin/lowongan/show/{id}', [App\Http\Controllers\AdminController::class, 'showLowongan']);


// Admin Lamaran
Route::get('/admin/lamaran', [App\Http\Controllers\AdminController::class, 'lamaran']);
Route::get('/admin/lamaran/{$id}', [App\Http\Controllers\AdminController::class, 'viewLamaran']);


// Admin Pelamar
Route::get('/admin/pelamar', [App\Http\Controllers\AdminController::class, 'pelamar']);
Route::get('/admin/pelamar/{id}', [App\Http\Controllers\AdminController::class, 'viewPelamar']);






// Admin Akun
Route::get('/admin/akun', [App\Http\Controllers\AdminController::class, 'indexAkun']);
Route::get('/admin/akun/create', [App\Http\Controllers\AdminController::class, 'createAkun']);
Route::post('/admin/akun/store', [App\Http\Controllers\AdminController::class, 'storeAkun']);
Route::get('/admin/akun/edit/{id}', [App\Http\Controllers\AdminController::class, 'editAkun']);
Route::patch('/admin/akun/update/{id}', [App\Http\Controllers\AdminController::class, 'updateAkun']);
Route::delete('/admin/akun/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteAkun']);
// Route::get('/admin/administrasi/show/{id}', [App\Http\Controllers\AdminController::class, 'showAdministrasi']);


// Admin Administrasi
Route::get('/admin/administrasi', [App\Http\Controllers\AdminController::class, 'indexAdministrasi']);
Route::get('/admin/administrasi/create', [App\Http\Controllers\AdminController::class, 'createAdministrasi']);
Route::post('/admin/administrasi/store', [App\Http\Controllers\AdminController::class, 'storeAdministrasi']);
Route::get('/admin/administrasi/edit/{id}', [App\Http\Controllers\AdminController::class, 'editAdministrasi']);
Route::patch('/admin/administrasi/update/{id}', [App\Http\Controllers\AdminController::class, 'updateAdministrasi']);
Route::delete('/admin/administrasi/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteAdministrasi']);
// Route::get('/admin/administrasi/show/{id}', [App\Http\Controllers\AdminController::class, 'showAdministrasi']);

// Admin Jadwal Keterampilan
Route::get('/admin/jadwal_keterampilan', [App\Http\Controllers\AdminController::class, 'indexJadwalKeterampilan']);
Route::get('/admin/jadwal_keterampilan/create', [App\Http\Controllers\AdminController::class, 'createJadwalKeterampilan']);
Route::post('/admin/jadwal_keterampilan/store', [App\Http\Controllers\AdminController::class, 'storeJadwalKeterampilan']);
Route::get('/admin/jadwal_keterampilan/edit/{id}', [App\Http\Controllers\AdminController::class, 'editJadwalKeterampilan']);
Route::patch('/admin/jadwal_keterampilan/update/{id}', [App\Http\Controllers\AdminController::class, 'updateJadwalKeterampilan']);
Route::delete('/admin/jadwal_keterampilan/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteJadwalKeterampilan']);
// Route::get('/admin/jadwal_keterampilan/show/{id}', [App\Http\Controllers\AdminController::class, 'showJadwalKeterampilan']);


// Admin Keterampilan
Route::get('/admin/keterampilan', [App\Http\Controllers\AdminController::class, 'indexKeterampilan']);
Route::get('/admin/keterampilan/create', [App\Http\Controllers\AdminController::class, 'createKeterampilan']);
Route::post('/admin/keterampilan/store', [App\Http\Controllers\AdminController::class, 'storeKeterampilan']);
Route::get('/admin/keterampilan/edit/{id}', [App\Http\Controllers\AdminController::class, 'editKeterampilan']);
Route::patch('/admin/keterampilan/update/{id}', [App\Http\Controllers\AdminController::class, 'updateKeterampilan']);
Route::delete('/admin/keterampilan/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteKeterampilan']);
// Route::get('/admin/keterampilan/show/{id}', [App\Http\Controllers\AdminController::class, 'showKeterampilan']);


// Admin Jadwal Wawancara
Route::get('/admin/jadwal_wawancara', [App\Http\Controllers\AdminController::class, 'indexJadwalWawancara']);
Route::get('/admin/jadwal_wawancara/create', [App\Http\Controllers\AdminController::class, 'createJadwalWawancara']);
Route::post('/admin/jadwal_wawancara/store', [App\Http\Controllers\AdminController::class, 'storeJadwalWawancara']);
Route::get('/admin/jadwal_wawancara/edit/{id}', [App\Http\Controllers\AdminController::class, 'editJadwalWawancara']);
Route::patch('/admin/jadwal_wawancara/update/{id}', [App\Http\Controllers\AdminController::class, 'updateJadwalWawancara']);
Route::delete('/admin/jadwal_wawancara/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteJadwalWawancara']);
// Route::get('/admin/jadwal_wawancara/show/{id}', [App\Http\Controllers\AdminController::class, 'showJadwalWawancara']);


// Admin Keterampilan
Route::get('/admin/wawancara', [App\Http\Controllers\AdminController::class, 'indexWawancara']);
Route::get('/admin/wawancara/create', [App\Http\Controllers\AdminController::class, 'createWawancara']);
Route::post('/admin/wawancara/store', [App\Http\Controllers\AdminController::class, 'storeWawancara']);
Route::get('/admin/wawancara/edit/{id}', [App\Http\Controllers\AdminController::class, 'editWawancara']);
Route::patch('/admin/wawancara/update/{id}', [App\Http\Controllers\AdminController::class, 'updateWawancara']);
Route::delete('/admin/wawancara/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteWawancara']);
Route::get('/admin/wawancara/show/{id}', [App\Http\Controllers\AdminController::class, 'showWawancara']);

// Peringkat
Route::get('/admin/peringkat', [App\Http\Controllers\AdminController::class, 'peringkat']);


//Kabid
// Admin
Route::get('/kabid', [App\Http\Controllers\KabidController::class, 'dashboard']);
Route::get('/kabid/dashboard', [App\Http\Controllers\KabidController::class, 'dashboard']);


// Admin Lowongan
Route::get('/kabid/lowongan', [App\Http\Controllers\KabidController::class, 'indexLowongan']);
Route::get('/kabid/lowongan/create', [App\Http\Controllers\KabidController::class, 'createLowongan']);
Route::post('/kabid/lowongan/store', [App\Http\Controllers\KabidController::class, 'storeLowongan']);
Route::get('/kabid/lowongan/edit/{id}', [App\Http\Controllers\KabidController::class, 'editLowongan']);
Route::patch('/kabid/lowongan/update/{id}', [App\Http\Controllers\KabidController::class, 'updateLowongan']);
Route::delete('/kabid/lowongan/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteLowongan']);
// Route::get('/admin/lowongan/show/{id}', [App\Http\Controllers\AdminController::class, 'showLowongan']);


// Admin Lamaran
Route::get('/kabid/lamaran', [App\Http\Controllers\KabidController::class, 'lamaran']);
Route::get('/kabid/lamaran/{$id}', [App\Http\Controllers\KabidController::class, 'viewLamaran']);


// Admin Pelamar
Route::get('/kabid/pelamar', [App\Http\Controllers\KabidController::class, 'pelamar']);
Route::get('/kabid/pelamar/{$id}', [App\Http\Controllers\KabidController::class, 'viewPelamar']);






// Admin Akun
Route::get('/kabid/akun', [App\Http\Controllers\KabidController::class, 'indexAkun']);
Route::get('/kabid/akun/create', [App\Http\Controllers\KabidController::class, 'createAkun']);
Route::post('/kabid/akun/store', [App\Http\Controllers\KabidController::class, 'storeAkun']);
Route::get('/kabid/akun/edit/{id}', [App\Http\Controllers\KabidController::class, 'editAkun']);
Route::patch('/kabid/akun/update/{id}', [App\Http\Controllers\KabidController::class, 'updateAkun']);
Route::delete('/kabid/akun/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteAkun']);
// Route::get('/admin/administrasi/show/{id}', [App\Http\Controllers\AdminController::class, 'showAdministrasi']);


// Admin Administrasi
Route::get('/kabid/administrasi', [App\Http\Controllers\KabidController::class, 'indexAdministrasi']);
Route::get('/kabid/administrasi/create', [App\Http\Controllers\KabidController::class, 'createAdministrasi']);
Route::post('/kabid/administrasi/store', [App\Http\Controllers\KabidController::class, 'storeAdministrasi']);
Route::get('/kabid/administrasi/edit/{id}', [App\Http\Controllers\KabidController::class, 'editAdministrasi']);
Route::patch('/kabid/administrasi/update/{id}', [App\Http\Controllers\KabidController::class, 'updateAdministrasi']);
Route::delete('/kabid/administrasi/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteAdministrasi']);
// Route::get('/admin/administrasi/show/{id}', [App\Http\Controllers\AdminController::class, 'showAdministrasi']);

// Admin Jadwal Keterampilan
Route::get('/kabid/jadwal_keterampilan', [App\Http\Controllers\KabidController::class, 'indexJadwalKeterampilan']);
Route::get('/kabid/jadwal_keterampilan/create', [App\Http\Controllers\KabidController::class, 'createJadwalKeterampilan']);
Route::post('/kabid/jadwal_keterampilan/store', [App\Http\Controllers\KabidController::class, 'storeJadwalKeterampilan']);
Route::get('/kabid/jadwal_keterampilan/edit/{id}', [App\Http\Controllers\KabidController::class, 'editJadwalKeterampilan']);
Route::patch('/kabid/jadwal_keterampilan/update/{id}', [App\Http\Controllers\KabidController::class, 'updateJadwalKeterampilan']);
Route::delete('/kabid/jadwal_keterampilan/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteJadwalKeterampilan']);
// Route::get('/admin/jadwal_keterampilan/show/{id}', [App\Http\Controllers\AdminController::class, 'showJadwalKeterampilan']);


// Admin Keterampilan
Route::get('/kabid/keterampilan', [App\Http\Controllers\KabidController::class, 'indexKeterampilan']);
Route::get('/kabid/keterampilan/create', [App\Http\Controllers\KabidController::class, 'createKeterampilan']);
Route::post('/kabid/keterampilan/store', [App\Http\Controllers\KabidController::class, 'storeKeterampilan']);
Route::get('/kabid/keterampilan/edit/{id}', [App\Http\Controllers\KabidController::class, 'editKeterampilan']);
Route::patch('/kabid/keterampilan/update/{id}', [App\Http\Controllers\KabidController::class, 'updateKeterampilan']);
Route::delete('/kabid/keterampilan/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteKeterampilan']);
// Route::get('/admin/keterampilan/show/{id}', [App\Http\Controllers\AdminController::class, 'showKeterampilan']);


// Admin Jadwal Wawancara
Route::get('/kabid/jadwal_wawancara', [App\Http\Controllers\KabidController::class, 'indexJadwalWawancara']);
Route::get('/kabid/jadwal_wawancara/create', [App\Http\Controllers\KabidController::class, 'createJadwalWawancara']);
Route::post('/kabid/jadwal_wawancara/store', [App\Http\Controllers\KabidController::class, 'storeJadwalWawancara']);
Route::get('/kabid/jadwal_wawancara/edit/{id}', [App\Http\Controllers\KabidController::class, 'editJadwalWawancara']);
Route::patch('/kabid/jadwal_wawancara/update/{id}', [App\Http\Controllers\KabidController::class, 'updateJadwalWawancara']);
Route::delete('/kabid/jadwal_wawancara/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteJadwalWawancara']);
// Route::get('/admin/jadwal_wawancara/show/{id}', [App\Http\Controllers\AdminController::class, 'showJadwalWawancara']);


// Admin Keterampilan
Route::get('/kabid/wawancara', [App\Http\Controllers\KabidController::class, 'indexWawancara']);
Route::get('/kabid/wawancara/create', [App\Http\Controllers\KabidController::class, 'createWawancara']);
Route::post('/kabid/wawancara/store', [App\Http\Controllers\KabidController::class, 'storeWawancara']);
Route::get('/kabid/wawancara/edit/{id}', [App\Http\Controllers\KabidController::class, 'editWawancara']);
Route::patch('/kabid/wawancara/update/{id}', [App\Http\Controllers\KabidController::class, 'updateWawancara']);
Route::delete('/kabid/wawancara/delete/{id}', [App\Http\Controllers\KabidController::class, 'deleteWawancara']);
Route::get('/kabid/wawancara/show/{id}', [App\Http\Controllers\KabidController::class, 'showWawancara']);

// Peringkat
Route::get('/kabid/peringkat', [App\Http\Controllers\KabidController::class, 'peringkat']);