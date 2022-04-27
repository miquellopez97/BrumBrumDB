<?php

use App\Http\Controllers\ApibbuserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('user', ApibbuserController::class);

Route::post('auth/login', [ApibbuserController::class, 'login']);
Route::get('auth/logout', [ApibbuserController::class, 'logout']);
Route::get('indexFilter', [ApibbuserController::class, 'indexFilter']);

Route::get('getUser', [ApibbuserController::class, 'getUser']);
