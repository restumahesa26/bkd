<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\SKController;
use App\Http\Controllers\Dosen\KinerjaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])
->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/cetak-kinerja/{id}', [KinerjaController::class, 'cetak'])->name('kinerja.cetak');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth', 'admin'])
    ->group(function() {
        Route::resource('data-dosen', DosenController::class);

        Route::resource('mata-kuliah', MataKuliahController::class);

        Route::get('/sk', [SKController::class, 'index'])->name('sk.index');

        Route::get('/sk/{id}/detail', [SKController::class, 'show'])->name('sk.show');

        Route::put('/sk/{id}/detail/verifikasi', [SKController::class, 'verifikasi'])->name('sk.verifikasi');

        Route::get('/sk/{id}/tolak', [SKController::class, 'tolak'])->name('sk.tolak');
    });

Route::middleware(['auth', 'dosen'])
    ->group(function() {
        Route::get('/kinerja', [KinerjaController::class, 'index'])->name('kinerja.index');

        Route::post('/kinerja/tambah', [KinerjaController::class, 'create_kinerja'])->name('kinerja.create');

        Route::get('/kinerja/show-detail/{id}', [KinerjaController::class, 'show_matkul'])->name('kinerja.show-detail');

        Route::get('/kinerja/show-detail/{id}/tambah-matkul', [KinerjaController::class, 'tambah_matkul'])->name('kinerja.tambah-matkul');

        Route::get('/kinerja/show-detail/edit-matkul/{id}', [KinerjaController::class, 'edit_matkul'])->name('kinerja.edit-matkul');

        Route::put('/kinerja/show-detail/update-matkul/{id}', [KinerjaController::class, 'update_matkul'])->name('kinerja.update-matkul');

        Route::post('/kinerja/show-detail/tambah-matkul/store', [KinerjaController::class, 'store_matkul'])->name('kinerja.store-matkul');

        Route::delete('/kinerja/{id}/hapus', [KinerjaController::class, 'destroy'])->name('kinerja.destroy');

        Route::delete('/kinerja/hapus-matkul/{id}', [KinerjaController::class, 'destroy_matkul'])->name('kinerja.destroy_matkul');

        Route::get('/kinerja/selesai/{id}', [KinerjaController::class, 'selesai'])->name('kinerja.selesai');
    });

require __DIR__.'/auth.php';
