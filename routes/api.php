<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\RoomController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // Property Routes
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::get('/properties/{property}', [PropertyController::class, 'show']);
    Route::post('/properties', [PropertyController::class, 'store']);
    Route::put('/properties/{property}', [PropertyController::class, 'update']);
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy']);

    // Room Routes
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/rooms/{property}', [RoomController::class, 'roomsFromProperty']);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::put('/rooms/{room}', [RoomController::class, 'update']);
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


