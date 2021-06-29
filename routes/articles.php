<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::middleware(['auth'])->group(function () {
    Route::get('/articles', [ArticleController::class, 'list']);
    Route::middleware(['hasAccessToProject', 'storeProjectInSession'])->group(function () {
        Route::prefix('projects/{projectId}/articles')->group(function () {
            Route::get('/', [ArticleController::class, 'index']);
            Route::get('/create', [ArticleController::class, 'create']);
            Route::middleware(['isProjectBanned'])->group(function () {
                Route::post('/', [ArticleController::class, 'store']);
            });
            Route::get('/{articleId}/edit', [ArticleController::class, 'edit']);
            Route::put('/{articleId}', [ArticleController::class, 'update']);
            Route::middleware(['canDeleteArticle'])->group(function () {
                Route::delete('/{articleId}', [ArticleController::class, 'delete']);
            });
        });
    });
});
