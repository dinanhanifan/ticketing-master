<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

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

Route::get('/', [TiketController::class, 'index'])->name('tiket.index');
Route::post('/store', [TiketController::class, 'store'])->name('tiket.store');
Route::get('/pemesanan-success/{id}', [TiketController::class, 'pesananSukes'])->name('tiket.pesananSukes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin/daftar-pemesan');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [TiketController::class, 'index'])->name('admin.index');
        Route::get('/daftar-pemesan', [TiketController::class, 'daftarPemesan'])->name('admin.daftarPemesan');

        // Route::post('/store', [TiketController::class, 'store'])->name('roles.store');
        // Route::get('/edit/{role}', [TiketController::class, 'show'])->name('roles.show');
        // Route::post('/update/{role}', [TiketController::class, 'update'])->name('roles.update');
        // Route::get('/delete/{role}', [TiketController::class, 'destroy'])->name('roles.destroy');
        Route::get('/check-in', [TiketController::class, 'checkIn'])->name('admin.checkIn');
        Route::get('/laporan', [TiketController::class, 'laporan'])->name('admin.laporan');
        Route::post('/check-in/store', [TiketController::class, 'checkInStore'])->name('tiket.checkIn');
        Route::get('/checked-in/{id}', [TiketController::class, 'checkedIn'])->name('admin.checkedIn');
        Route::get('/edit/{id}', [TiketController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [TiketController::class, 'update'])->name('tiket.update');
        Route::get('/destroy/{id}', [TiketController::class, 'destroy'])->name('admin.destroy');
        
    });

});