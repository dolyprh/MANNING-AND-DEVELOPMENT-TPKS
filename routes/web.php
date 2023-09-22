<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\Master\MasterController;
use App\Http\Controllers\Admin\Master\MenuController;
use App\Http\Controllers\Admin\perencanaan\JGroupController;
use App\Http\Controllers\Admin\perencanaan\RencanaController;
use App\Http\Controllers\Admin\spk\SpkBaruController;
use App\Http\Controllers\Admin\spk\RiwayatSpkController;
use App\Http\Controllers\Admin\fooding\JTanpaMakanController;
use App\Http\Controllers\Admin\fooding\JKateringController;
use App\Http\Controllers\Admin\fooding\PesananController;
use App\Http\Controllers\Admin\laporan\LaporanController;
use App\Http\Controllers\Admin\Master\AlatController;
use App\Http\Controllers\Admin\Master\ParamController;
use App\Http\Controllers\Admin\Master\KateringController;
use App\Http\Controllers\Admin\Master\ShiftController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pengguna/pegawai');
// });

Route::get('/pengguna', [PenggunaController::class, 'pengguna']);

Route::get('/', [AdminController::class, 'index'])->middleware('isLogin');
Route::get('/sidebar', [AdminController::class, 'menu']);
Route::get('/login', [LoginController::class, 'view_login']);
Route::post('/login', [LoginController::class, 'postlogin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('pegawai-mitra', [MasterController::class, 'pegawai_mitra']);
Route::get('notifikasi', [MasterController::class, 'notifikasi']);
Route::get('group', [MasterController::class, 'group']);
Route::get('mitra-kerja', [MasterController::class, 'mitra_kerja']);
Route::get('pegawai', [MasterController::class, 'pegawai']);
Route::get('jenis-absen', [MasterController::class, 'jenis_absen']);

Route::get('rencana-baru', [RencanaController::class, 'rencana_baru']);
Route::get('jadwal-group', [JGroupController::class, 'jadwal_group']);

Route::get('spk-baru', [SpkBaruController::class, 'spk_baru']);
Route::get('riwayat-spk', [RiwayatSpkController::class, 'riwayat_spk']);

Route::get('jadwal-tanpa-makan', [JTanpaMakanController::class, 'jadwal_tanpa_makan']);
Route::get('jadwal-katering', [JKateringController::class, 'jadwal_katering']);
Route::get('pesanan', [PesananController::class, 'pesanan']);

Route::get('laporan', [LaporanController::class, 'laporan']);

//Untuk CRUD Master Setup
Route::resource('/menu', MenuController::class);
Route::resource('/alat', AlatController::class);
Route::resource('/parameter', ParamController::class);
Route::resource('/katering', KateringController::class);
Route::resource('/shift', ShiftController::class);





