<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index']);
        Route::post('/store', [AuthorController::class, 'store']);
        Route::get('show/{id}', [AuthorController::class, 'show']);
        Route::get('edit/{id}', [AuthorController::class, 'edit']);
        Route::post('/update/{id}', [AuthorController::class, 'update']);
        Route::delete('/delete/{id}', [AuthorController::class, 'destroy']);
    });
    Route::prefix('books')->group(function () {

        Route::get('/', [BookController::class, 'index']);
        Route::post('/store', [BookController::class, 'store']);
        Route::get('show/{id}', [BookController::class, 'show']);
        Route::get('edit/{id}', [BookController::class, 'edit']);
        Route::post('/update/{id}', [BookController::class, 'update']);
        Route::delete('/delete/{id}', [BookController::class, 'destroy']);
    });
});
