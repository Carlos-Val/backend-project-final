<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;



//Rutas controladoras del User

Route::post('/user', [UserController::class, 'registerUser']);
Route::post('/user/login', [UserController::class, 'loginUser']);
Route::post('/user/logout', [UserController::class, 'logOutUser']);
Route::put('/user', [UserController::class, 'updateUser']);


