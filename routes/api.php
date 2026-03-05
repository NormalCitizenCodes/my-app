<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentAdminController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::match(['GET', 'POST'], '/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/greetJovan', function () {
        return "hello jovan nice to meet you";
    });

    // basic CRUD open to any authenticated user
    Route::apiResource('students', StudentController::class);

    // only admins (role) can access this
    Route::get('/admin/students', [StudentAdminController::class, 'index'])
        ->middleware('role:admin');

        
});

Route::get('/ping', function () {
    return 'api ok';
});