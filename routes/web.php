<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/to-nurasyah', [NurasyahController::class, 'index'])->name('nurasyah.index');