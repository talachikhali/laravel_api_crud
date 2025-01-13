<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class , 'store']);
Route::get('/categories/{category}', [CategoryController::class , 'show']);
Route::post('/categories/{category}', [CategoryController::class , 'update']);
Route::delete('/categories/{category}', [CategoryController::class , 'destroy']);

Route::get('/tags', [TagController::class, 'index']);
Route::post('/tags', [TagController::class , 'store']);
Route::get('/tags/{tag}', [TagController::class , 'show']);
Route::post('/tags/{tag}', [TagController::class , 'update']);
Route::delete('/tags/{tag}', [TagController::class , 'destroy']);