<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/token-test', function () {
    $user = \App\Models\User::first();
    if (! $user) {
        return response()->json(['message' => 'No users found. Please register first.'], 404);
    }
    return $user->createToken('test')->plainTextToken;
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);
    Route::apiResource('products', ProductController::class);
});
