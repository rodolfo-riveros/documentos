<?php

use App\Http\Controllers\Docu\HomeController;
use App\Http\Controllers\Docu\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('home', HomeController::class)->only(['index', 'edit', 'update'])->names('docu.home');
Route::resource('users', UserController::class)->only(['index', 'store', 'update', 'destroy'])->names('docu.users');
