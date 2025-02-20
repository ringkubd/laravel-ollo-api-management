<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\AdminController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'rate.limiting', 'logging'])->group(function () {
    Route::post('/generate', [ProxyController::class, 'generate']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/logs', [AdminController::class, 'logs']);
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::post('/generate', [ProxyController::class, 'generate']);
    Route::get('/admin/logs', [AdminController::class, 'logs']);
});
