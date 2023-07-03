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

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/register', function () {
    return view('login.register');
});

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

Route::get('/pelamar/profil', [App\Http\Controllers\PelamarController::class, 'index']);
Route::get('/pelamar/profil/create', [App\Http\Controllers\PelamarController::class, 'create']);
Route::post('/pelamar/profil/store', [App\Http\Controllers\PelamarController::class, 'store']);






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
// Route::get('/admin/jadwal_keterampilan/edit/{id}', [App\Http\Controllers\AdminController::class, 'editJadwalKeterampilan']);
// Route::patch('/admin/jadwal_keterampilan/update/{id}', [App\Http\Controllers\AdminController::class, 'updateJadwalKeterampilan']);
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
// Route::get('/admin/jadwal_wawancara/edit/{id}', [App\Http\Controllers\AdminController::class, 'editJadwalWawancara']);
// Route::patch('/admin/jadwal_wawancara/update/{id}', [App\Http\Controllers\AdminController::class, 'updateJadwalWawancara']);
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