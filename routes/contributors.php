<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContributorController;


Route::middleware(['auth', 'hasAccessToProject', 'storeProjectInSession'])->group(function () {
    Route::prefix('projects/{projectId}/contributors')->group(function () {
        Route::get('/', [ContributorController::class, 'contributors']);
        Route::get('/add', [ContributorController::class, 'addContributor']);
        Route::middleware(['canEditContributor'])->group(function () {
            Route::get('/{contributorId}', [ContributorController::class, 'edit']);
            Route::put('/{contributorId}', [ContributorController::class, 'update']);
            Route::delete('/{contributorId}', [ContributorController::class, 'delete']);
        });
    });
});
