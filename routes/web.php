<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CompanySettingController;

// Halaman Utama Publik
Route::get('/', [HomeController::class, 'index']);

// Endpoint Publik untuk Kirim Testimoni Klien
Route::post('/testimonials/public', [TestimonialController::class, 'publicStore'])->name('testimonials.public.store');

// Route Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Admin (Diproteksi Auth)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::get('settings', [CompanySettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [CompanySettingController::class, 'update'])->name('settings.update');
});