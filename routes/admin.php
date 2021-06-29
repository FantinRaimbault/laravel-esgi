<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/bans/projects/{projectId}', [AdminController::class, 'showBanProject']);
    Route::post('/admin/bans/projects/{projectId}', [AdminController::class, 'storeBanProject']);
    Route::get('/admin/articles/{articleId}/delete', [AdminController::class, 'showDeleteArticle']);
    Route::get('/admin/banned-projects', [AdminController::class, 'showBannedProject']);
    Route::delete('/admin/banned-projects/{projectId}', [AdminController::class, 'removeBannedProject']);
    Route::delete('/admin/article/{articleId}/delete', [AdminController::class, 'deleteArticle']);
});
