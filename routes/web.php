<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class,'register'])->name('register');
    Route::post('register', [AuthController::class,'registerVerify']);
    Route::post('signOut', [AuthController::class,'registerVerify'])->name('signOut');
});

//Protegidas
Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');
});