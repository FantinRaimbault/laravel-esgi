<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;


Route::middleware(['auth'])->group(function () {
    Route::delete('invitations/{invitationId}/accept', [InvitationController::class, 'accept']);
    Route::delete('invitations/{invitationId}/refuse', [InvitationController::class, 'refuse']);
    Route::delete('/refuse', [InvitationController::class, 'refuse']);
    Route::prefix('invitations/projects/{projectId}')->group(function () {
        Route::post('/', [InvitationController::class, 'send']);
    });
});
