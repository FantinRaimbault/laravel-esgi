<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::middleware(['auth', 'hasAlreadySentReport'])->group(function () {
    Route::get('/reports/articles/{articleId}', [ReportController::class, 'index']);
    Route::post('/reports/articles/{articleId}', [ReportController::class, 'store']);
});
