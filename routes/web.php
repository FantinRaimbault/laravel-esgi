<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

require __DIR__.'/auth.php';
require __DIR__.'/projects.php';
require __DIR__.'/articles.php';
require __DIR__.'/invitations.php';
require __DIR__.'/contributors.php';
require __DIR__.'/users.php';
require __DIR__.'/reports.php';
require __DIR__.'/admin.php';
require __DIR__.'/messenger.php';
