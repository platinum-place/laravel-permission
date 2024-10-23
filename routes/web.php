<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [config('app.name') => app()->version()];
});

Route::withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class])->group(function () {
    require __DIR__.'/auth.php';
});
