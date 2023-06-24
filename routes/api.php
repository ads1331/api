<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GramoteController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('certificate',[\App\Http\Controllers\Api\GramoteController::class,'index']);
Route::post('certificate',[\App\Http\Controllers\Api\GramoteController::class,'store']);
Route::delete('certificate',[\App\Http\Controllers\Api\GramoteController::class,'storee']);


Route::get('reg',[\App\Http\Controllers\Api\RegisterController::class,'getreg']);
Route::post('reg',[\App\Http\Controllers\Api\RegisterController::class,'postreg']);





Route::get('users',[\App\Http\Controllers\Api\LoginController::class,'getlog']);
Route::post('login',[\App\Http\Controllers\Api\LoginController::class,'postlog']);





