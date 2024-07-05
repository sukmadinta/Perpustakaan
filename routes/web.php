<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


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

// Route default mengarahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});



Route::get('/', function () {
    return view('index');
});

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

//Route untuk Data Buku
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Anggota
Route::get('/anggota', 'AnggotaController@anggotatampil');
Route::post('/anggota/tambah', 'AnggotaController@anggotatambah');
Route::get('/anggota/hapus/{id_anggota}', 'AnggotaController@anggotahapus');
Route::put('/anggota/edit/{id_anggota}', 'AnggotaController@anggotaedit');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');
Route::post('/petugas/tambah', 'PetugasController@petugastambah');
Route::get('/petugas/hapus/{id_petugas}', 'PetugasController@petugashapus');
Route::put('/petugas/edit/{id_petugas}', 'PetugasController@petugasedit');

//Route untuk Data Peminjaman
use App\Http\Controllers\PinjamController;

// Rute untuk menampilkan data peminjaman
Route::get('/pinjam', [PinjamController::class, 'pinjamtampil'])->name('pinjamtampil');
Route::post('/pinjam/tambah', [PinjamController::class, 'pinjamtambah'])->name('pinjamtambah');
Route::put('/pinjam/edit/{id_pinjam}', [PinjamController::class, 'pinjamedit'])->name('pinjamedit');
Route::get('/pinjam/hapus/{id_pinjam}', [PinjamController::class, 'pinjamhapus'])->name('pinjamhapus');


use App\Http\Controllers\PengembalianController;

Route::get('/pengembalian', [PengembalianController::class, 'pengembaliantampil'])->name('pengembalian.tampil');
Route::post('/pengembalian/tambah', [PengembalianController::class, 'pengembaliantambah'])->name('pengembalian.tambah');
Route::delete('/pengembalian/hapus/{id_pengembalian}', [PengembalianController::class, 'pengembalianhapus'])->name('pengembalian.hapus');
Route::put('/pengembalian/edit/{id_pengembalian}', [PengembalianController::class, 'pengembalianedit'])->name('pengembalian.edit');

use App\Http\Controllers\DendaController;
Route::post('/hitung-denda', [DendaController::class, 'hitungDenda']);

use App\Http\Controllers\SearchController;
Route::get('/search', [SearchController::class, 'search'])->name('search');
