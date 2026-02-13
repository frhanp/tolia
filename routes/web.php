<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurasyahController;

Route::get('/', [NurasyahController::class, 'index'])->name('home');