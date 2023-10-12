<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\Master\MasterController;
use App\Http\Controllers\Admin\Master\MenuController;
use App\Http\Controllers\Admin\perencanaan\JadwalGroupController;
use App\Http\Controllers\Admin\perencanaan\JGroupController;
use App\Http\Controllers\Admin\perencanaan\RBaruController;
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
use App\Http\Controllers\Admin\Master\PegawaiController;
use App\Http\Controllers\Admin\Master\GroupController;
use App\Http\Controllers\Admin\Master\AbsenController;
use App\Http\Controllers\Admin\Master\MitraController;

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

//Route::get('rencana-baru', [RencanaController::class, 'rencana_baru']);
// Route::get('jadwal-group', [JGroupController::class, 'jadwal_group']);

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
Route::resource('/pegawai', PegawaiController::class);
Route::resource('/group', GroupController::class);
Route::resource('/jenis-absen', AbsenController::class);
Route::resource('/mitra-kerja', MitraController::class);
Route::resource('/rencana-baru', RBaruController::class);

//Untuk CRUD Perencanaan Setup
Route::resource('/jadwal-group', JadwalGroupController::class);
Route::post('/search-data', [JadwalGroupController::class, 'search'])->name('search-data');
Route::post('/search-year', [JadwalGroupController::class, 'search_year'])->name('search-year');

//Untuk Import Perencanaan Jadwal Group
// Route::get('/jadwal-group', [JGroupController::class, 'importExcel']);
Route::post('/import-excel', [JGroupController::class, 'import'])->name('import-excel');

Route::post('/rencana-baru/update/detail/{id}/{ves_id}', [RBaruController::class, 'detail_rencana']);
Route::post('/rencana-kapal/detail', [RBaruController::class, 'view_rencana']);
Route::get('/rencana-baru/update/{id}', [RBaruController::class, 'edit_rencana']);

// Route::get('/insert-header', [RcnHeaderController::class, 'insert_header'])->name('insert-header');


