<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
    });
});