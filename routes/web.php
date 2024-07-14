<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AnakController,
    BlogController,
    DashboardController,
    DataMedisController,
    DokterController,
    KunjunganController,
    OrangTuaController,
    MonitoringController,
    LaporanController,
    LoginController,
    WebsiteController
};

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

Route::get('/', [WebsiteController::class, 'index'])->name('web.index');
Route::get('/beritas/{id}', [WebsiteController::class, 'showBerita'])->name('web.show-berita');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/orangtua', [OrangTuaController::class, 'index'])->name('orangtua.index');
Route::get('/orangtua/tambah', [OrangTuaController::class, 'tambah'])->name('orangtua.tambah');
Route::post('/orangtua', [OrangTuaController::class, 'store'])->name('orangtua.store');
Route::get('/orangtua/{id}/edit', [OrangTuaController::class, 'edit'])->name('orangtua.edit');
Route::put('/orangtua/{id}', [OrangTuaController::class, 'update'])->name('orangtua.update');
Route::delete('/orangtua/{id}', [OrangTuaController::class, 'destroy'])->name('orangtua.destroy');

Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/tambah', [DokterController::class, 'tambah'])->name('dokter.tambah');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

Route::get('/anak', [AnakController::class, 'index'])->name('anak.index');
Route::get('/anak/tambah', [AnakController::class, 'tambah'])->name('anak.tambah');
Route::post('/anak', [AnakController::class, 'store'])->name('anak.store');
Route::get('/anak/{id}/edit', [AnakController::class, 'edit'])->name('anak.edit');
Route::put('/anak/{id}', [AnakController::class, 'update'])->name('anak.update');
Route::delete('/anak/{id}', [AnakController::class, 'destroy'])->name('anak.destroy');

Route::get('/datamedis', [DataMedisController::class, 'index'])->name('datamedis.index');
Route::get('/datamedis/tambah', [DataMedisController::class, 'tambah'])->name('datamedis.tambah');
Route::post('/datamedis', [DataMedisController::class, 'store'])->name('datamedis.store');
Route::get('/datamedis/{id}/edit', [DataMedisController::class, 'edit'])->name('datamedis.edit');
Route::put('/datamedis/{id}', [DataMedisController::class, 'update'])->name('datamedis.update');
Route::delete('/datamedis/{id}', [DataMedisController::class, 'destroy'])->name('datamedis.destroy');

Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
Route::get('/kunjungan/tambah', [KunjunganController::class, 'tambah'])->name('kunjungan.tambah');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
Route::get('/kunjungan/{id}/edit', [KunjunganController::class, 'edit'])->name('kunjungan.edit');
Route::put('/kunjungan/{id}', [KunjunganController::class, 'update'])->name('kunjungan.update');
Route::delete('/kunjungan/{id}', [KunjunganController::class, 'destroy'])->name('kunjungan.destroy');

Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
Route::get('/monitoring/tambah', [MonitoringController::class, 'tambah'])->name('monitoring.tambah');
Route::post('/monitoring', [MonitoringController::class, 'store'])->name('monitoring.store');
Route::get('/monitoring/{id}/edit', [MonitoringController::class, 'edit'])->name('monitoring.edit');
Route::put('/monitoring/{id}', [MonitoringController::class, 'update'])->name('monitoring.update');
Route::delete('/monitoring/{id}', [MonitoringController::class, 'destroy'])->name('monitoring.destroy');

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/show/{id}', [LaporanController::class, 'show'])->name('laporan.show');
Route::get('/laporan/print/{id}', [LaporanController::class, 'prints'])->name('laporan.print');
// reportOrangTua
Route::get('/laporan/orangtua', [LaporanController::class, 'reportOrangTua'])->name('laporan.reportOrangTua');

// Blog
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/tambah', [BlogController::class, 'create'])->name('blog.tambah');
Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
