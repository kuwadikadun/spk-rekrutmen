<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/profil', function () {
    return view('user.profil');
});

Route::get('/kategori', function () {
    return view('user.kategori');
});

Route::get('/pelamar', function () {
    return view('admin.pelamar');
});

Route::get('/user', function () {
    return view('admin.user');
});

Route::get('/tes_interview', function () {
    return view('admin.interview');
    // jadwal interview dan nilai
});

Route::get('/tes_bidang', function () {
    return view('admin.bidang');
    //jadwal tes bidang dan nilai
});

Route::get('/pelamar_diterima', function () {
    return view('admin.pelamar-diterima');
    // ranking, nama, telepon, email, nilai
});