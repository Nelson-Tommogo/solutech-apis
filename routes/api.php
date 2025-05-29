<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'tenancy'])->group(function () {
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events/{event}', [EventController::class, 'show']);
    Route::put('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy']);
    
    Route::get('/events/{event}/attendees', [AttendeeController::class, 'index']);
    Route::post('/events/{event}/attendees', [AttendeeController::class, 'store']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/organizations', [OrganizationController::class, 'store']);
});