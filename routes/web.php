<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserLawyerController;
use App\Http\Controllers\Admin\LawyerController as AdminLawyerController;

/*
|--------------------------------------------------------------------------
| AUTH ADMIN (LOGIN MANUAL)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| USER (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Ambil data pengacara dari database supaya ditampilkan di landing page
    $lawyers = \App\Models\Lawyer::all();
    return view('landing', compact('lawyers'));
})->name('home');


Route::get('/pengacara/{id}', [UserLawyerController::class, 'detail'])->name('pengacara.detail');
// Halaman booking form
Route::get('/booking', [OrderController::class, 'create'])->name('booking.create');

Route::post('/booking', [OrderController::class, 'booking'])->name('booking.send');


/*
|--------------------------------------------------------------------------
| ADMIN AREA (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Pengacara
    Route::get('/pengacara', [AdminLawyerController::class, 'index'])->name('admin.pengacara.index');
    Route::get('/pengacara/create', [AdminLawyerController::class, 'create'])->name('admin.pengacara.create');
    Route::post('/pengacara', [AdminLawyerController::class, 'store'])->name('admin.pengacara.store');
    Route::get('/pengacara/{id}/edit', [AdminLawyerController::class, 'edit'])->name('admin.pengacara.edit');
    Route::put('/pengacara/{id}', [AdminLawyerController::class, 'update'])->name('admin.pengacara.update');
    Route::delete('/pengacara/{id}', [AdminLawyerController::class, 'destroy'])->name('admin.pengacara.destroy');
});