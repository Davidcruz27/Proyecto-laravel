<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify']);
    Route::get('register', [AuthController::class,'register'])->name('register');
    Route::post('register', [AuthController::class,'registerVerify']);
});

//Protegidas
Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');
});