<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/greetJovan', function () {
    return "hello jovan nice to meet you";
});

// THIS LINE IS THE KEY
Route::apiResource('students', StudentController::class);