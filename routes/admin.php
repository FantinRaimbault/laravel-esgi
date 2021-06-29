<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/bans/projects/{projectId}', [AdminController::class, 'showBanProject']);
    Route::post('/admin/bans/projects/{projectId}', [AdminController::class, 'storeBanProject']);
    Route::get('/admin/articles/{articleId}/delete', [AdminController::class, 'showDeleteArticle']);
    Route::delete('/admin/delete/article/{articleId}/delete', [AdminController::class, 'deleteArticle']);
});
