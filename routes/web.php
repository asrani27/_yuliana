<?php

use App\Models\Deviasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UpahController;

use App\Http\Controllers\BahanController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;;

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OverheadController;
use App\Http\Controllers\ProfilController;;

use App\Http\Controllers\PrestasiController;

use App\Http\Controllers\RencanaController;;

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TenagaKerjaController;;

Route::get('/', [LoginController::class, 'welcome']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/daftar', [DaftarController::class, 'index']);
// Route::post('/daftar', [DaftarController::class, 'store']);

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);

    Route::get('/superadmin/user', [UserController::class, 'index']);
    Route::get('/superadmin/user/add', [UserController::class, 'add']);
    Route::get('/superadmin/user/edit/{id}', [UserController::class, 'edit']);
    Route::get('/superadmin/user/delete/{id}', [UserController::class, 'delete']);
    Route::post('/superadmin/user/add', [UserController::class, 'store']);
    Route::post('/superadmin/user/edit/{id}', [UserController::class, 'update']);

    Route::get('/superadmin/profil', [ProfilController::class, 'index']);
    Route::post('/superadmin/profil', [ProfilController::class, 'update']);

    Route::get('/superadmin/upah', [UpahController::class, 'index']);
    Route::get('/superadmin/upah/add', [UpahController::class, 'add']);
    Route::post('/superadmin/upah/add', [UpahController::class, 'store']);
    Route::get('/superadmin/upah/edit/{id}', [UpahController::class, 'edit']);
    Route::post('/superadmin/upah/edit/{id}', [UpahController::class, 'update']);
    Route::get('/superadmin/upah/delete/{id}', [UpahController::class, 'delete']);

    Route::get('/superadmin/tenagakerja', [TenagaKerjaController::class, 'index']);
    Route::get('/superadmin/tenagakerja/add', [TenagaKerjaController::class, 'add']);
    Route::post('/superadmin/tenagakerja/add', [TenagaKerjaController::class, 'store']);
    Route::get('/superadmin/tenagakerja/edit/{id}', [TenagaKerjaController::class, 'edit']);
    Route::post('/superadmin/tenagakerja/edit/{id}', [TenagaKerjaController::class, 'update']);
    Route::get('/superadmin/tenagakerja/delete/{id}', [TenagaKerjaController::class, 'delete']);

    Route::get('/superadmin/jenis', [JenisController::class, 'index']);
    Route::get('/superadmin/jenis/add', [JenisController::class, 'add']);
    Route::post('/superadmin/jenis/add', [JenisController::class, 'store']);
    Route::get('/superadmin/jenis/edit/{id}', [JenisController::class, 'edit']);
    Route::post('/superadmin/jenis/edit/{id}', [JenisController::class, 'update']);
    Route::get('/superadmin/jenis/delete/{id}', [JenisController::class, 'delete']);

    Route::get('/superadmin/overhead', [OverheadController::class, 'index']);
    Route::get('/superadmin/overhead/add', [OverheadController::class, 'add']);
    Route::post('/superadmin/overhead/add', [OverheadController::class, 'store']);
    Route::get('/superadmin/overhead/edit/{id}', [OverheadController::class, 'edit']);
    Route::post('/superadmin/overhead/edit/{id}', [OverheadController::class, 'update']);
    Route::get('/superadmin/overhead/delete/{id}', [OverheadController::class, 'delete']);

    Route::get('/superadmin/bahan', [BahanController::class, 'index']);
    Route::get('/superadmin/bahan/add', [BahanController::class, 'add']);
    Route::post('/superadmin/bahan/add', [BahanController::class, 'store']);
    Route::get('/superadmin/bahan/edit/{id}', [BahanController::class, 'edit']);
    Route::post('/superadmin/bahan/edit/{id}', [BahanController::class, 'update']);
    Route::get('/superadmin/bahan/delete/{id}', [BahanController::class, 'delete']);

    Route::get('/superadmin/biaya', [BiayaController::class, 'index']);
    Route::get('/superadmin/biaya/add', [BiayaController::class, 'add']);
    Route::post('/superadmin/biaya/add', [BiayaController::class, 'store']);
    Route::get('/superadmin/biaya/edit/{id}', [BiayaController::class, 'edit']);
    Route::post('/superadmin/biaya/edit/{id}', [BiayaController::class, 'update']);
    Route::get('/superadmin/biaya/delete/{id}', [BiayaController::class, 'delete']);


    Route::get('/superadmin/jurnal', [JurnalController::class, 'index']);
    Route::get('/superadmin/jurnal/add', [JurnalController::class, 'add']);
    Route::post('/superadmin/jurnal/add', [JurnalController::class, 'store']);
    Route::get('/superadmin/jurnal/edit/{id}', [JurnalController::class, 'edit']);
    Route::post('/superadmin/jurnal/edit/{id}', [JurnalController::class, 'update']);
    Route::get('/superadmin/jurnal/delete/{id}', [JurnalController::class, 'delete']);

    Route::get('/laporan/pilih', [LaporanController::class, 'pilih']);
    Route::get('/laporan/klien/print', [LaporanController::class, 'pdfklien']);
    Route::get('/laporan/dokumen/print', [LaporanController::class, 'pdfdokumen']);
    Route::get('/laporan/evaluasi/print', [LaporanController::class, 'pdfevaluasi']);
    Route::get('/laporan/verifikasi/print', [LaporanController::class, 'pdfverifikasi']);
    Route::get('/laporan/dokumen', [LaporanController::class, 'dokumen']);
    Route::get('/laporan/verifikasi', [LaporanController::class, 'verifikasi']);
    Route::get('/laporan/evaluasi', [LaporanController::class, 'evaluasi']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
