<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::name('users.')->prefix('users')->group(function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
        Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('show');
        Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::patch('/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
        Route::put('{user}/restore', [\App\Http\Controllers\UserController::class, 'restore'])->name('restore');
    });
});
