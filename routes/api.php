<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomCategoryController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\AuthController;

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);

Route::get('/room-categories', [RoomCategoryController::class, 'index']);

//User

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

  Route::post('/logout', [AuthController::class, 'logout']);


  // Booking with tokens

  Route::post('/bookings', [BookingController::class, 'AddBooking']);
});

// Booking 
