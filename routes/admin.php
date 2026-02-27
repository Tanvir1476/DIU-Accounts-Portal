<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeRequestController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Form Show
        Route::get('/add', [FeeController::class, 'addForm']);

        // Save
        Route::post('/save', [FeeController::class, 'saveFee']);

        //View List
        Route::get('/list', [FeeController::class, 'list']);

        // Delete
        Route::get('/delete/{id}', [FeeController::class, 'delete']);

        // Edit Form
        Route::get('/edit/{id}', [FeeController::class, 'edit']);

        // Update
        Route::post('/update/{id}', [FeeController::class, 'update']);

        Route::get('/tokens', [FeeRequestController::class, 'adminIndex']);
        Route::get('/status/{id}/{status}', [FeeRequestController::class, 'updateStatus']);
    });
});
