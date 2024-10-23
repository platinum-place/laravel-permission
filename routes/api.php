<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
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
        Route::put('{id}/restore', [\App\Http\Controllers\UserController::class, 'restore'])->name('restore');
        Route::put('{id}/sync-roles', [\App\Http\Controllers\UserController::class, 'syncRoles'])->name('syncRoles');
        Route::put('{id}/sync-permissions', [\App\Http\Controllers\UserController::class, 'syncPermissions'])->name('syncPermissions');
    });

    Route::get('roles', \App\Http\Controllers\RoleController::class)->name('roles.index');
    Route::get('permissions', \App\Http\Controllers\PermissionController::class)->name('permissions.index');
});
