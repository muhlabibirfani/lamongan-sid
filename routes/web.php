<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Public\ComplaintController;
use App\Http\Controllers\Public\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicPageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/artikel', 'articles')->name('articles');
    Route::get('/lapak', 'lapak')->name('lapak');
    Route::get('/peta', 'map')->name('map');
    Route::get('/pembangunan', 'development')->name('development');
    Route::get('/statistik', 'statistics')->name('statistics');
    Route::get('/pengaduan', 'complaints')->name('complaints');
    Route::get('/layanan-mandiri', 'services')->name('services');
});

Route::post('/pengaduan', [ComplaintController::class, 'store'])->name('complaints.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('/login/demo', [AuthenticatedSessionController::class, 'demo'])->name('login.demo');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('desa', DesaController::class)->only(['index']);
    Route::get('/modul/{module}', [ModuleController::class, 'show'])->name('module.show');
});
