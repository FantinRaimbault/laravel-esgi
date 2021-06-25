<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


Route::middleware(['auth'])->group(function () {
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::middleware(['hasAccessToProject', 'storeProjectInSession'])->group(function () {
            Route::get('/{projectId}/informations', [ProjectController::class, 'show']);
            Route::put('/{projectId}', [ProjectController::class, 'update']);
        });
    });
});