<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/api/pengunjung', [VisitorController::class, 'Update'])->name('api.visitor');
});

