<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::prefix('auth')->group(function(){
    Route::get('login', function(){
        return 'Hola login';
    })->name('login');

    Route::get('register', [AuthController::class,'register']);
    Route::post('register', [AuthController::class,'registerVerify']);
});