<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurasyahController;
use App\Http\Controllers\AdminController;

Route::get('/', [NurasyahController::class, 'index'])->name('home');

// Love Studio / Admin Management Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/auth', [AdminController::class, 'login'])->name('admin.auth');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/general', [AdminController::class, 'updateGeneral'])->name('admin.general');
    Route::post('/photos', [AdminController::class, 'addPhoto'])->name('admin.photos.add');
    Route::post('/photos/delete', [AdminController::class, 'deletePhoto'])->name('admin.photos.delete');
    Route::post('/songs', [AdminController::class, 'addSong'])->name('admin.songs.add');
    Route::post('/songs/delete', [AdminController::class, 'deleteSong'])->name('admin.songs.delete');
    Route::post('/capsules', [AdminController::class, 'updateCapsules'])->name('admin.capsules.update');
    Route::post('/coupons', [AdminController::class, 'updateCoupons'])->name('admin.coupons.update');
    Route::post('/little-things', [AdminController::class, 'updateLittleThings'])->name('admin.little-things.update');
    Route::post('/reset', [AdminController::class, 'resetDefault'])->name('admin.reset');
});