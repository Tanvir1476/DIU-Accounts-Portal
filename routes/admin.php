<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeRequestController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/add', [FeeController::class, 'addForm']);
        Route::post('/save', [FeeController::class, 'saveFee']);
        Route::get('/list', [FeeController::class, 'list']);
        Route::get('/delete/{id}', [FeeController::class, 'delete']);
        Route::get('/edit/{id}', [FeeController::class, 'edit']);
        Route::post('/update/{id}', [FeeController::class, 'update']);


        Route::get('/tokens', [FeeRequestController::class, 'adminIndex']);
        Route::get('/status/{id}/{status}', [FeeRequestController::class, 'updateStatus']);

        Route::get('/push-notification', [FeeRequestController::class, 'pushPage'])->name('admin.push.page');
        Route::get('/send/{id}', [FeeRequestController::class, 'sendSingleNotification'])->name('admin.send.single');

        Route::get('/inactive-users', [FeeRequestController::class, 'inactiveUsers'])->name('admin.inactive.users');
        Route::get('/activate/{id}', [FeeRequestController::class, 'activateUser'])->name('admin.activate.user');
    });
});
