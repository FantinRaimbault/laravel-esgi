<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessengerController;

Route::middleware(['auth', 'hasAccessToProject'])->group(function () {
    Route::prefix('projects/{projectId}/messenger')->group(function () {
        Route::get('/', [MessengerController::class, 'index']);
        Route::post('/', [MessengerController::class, 'postMessage']);
    });
});
