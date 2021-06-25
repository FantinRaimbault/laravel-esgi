<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::middleware(['auth'])->group(function () {
    Route::get('/users/profile', [RegisteredUserController::class, 'show']);
});
