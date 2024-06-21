<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AnakController,
    DashboardController,
    DataMedisController,
    DokterController,
    KunjunganController,
    OrangTuaController,
    MonitoringController


  
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
Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

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