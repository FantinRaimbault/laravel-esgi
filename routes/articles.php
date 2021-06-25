<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::middleware(['auth', 'hasAccessToProject', 'storeProjectInSession'])->group(function () {
    Route::prefix('projects/{projectId}/articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index']);
        Route::get('/create', [ArticleController::class, 'create']);
        Route::post('/', [ArticleController::class, 'store']);
        Route::get('/{articleId}/edit', [ArticleController::class, 'edit']);
        Route::put('/{articleId}', [ArticleController::class, 'update']);
        Route::delete('/{articleId}', [ArticleController::class, 'delete']);
    });
});
