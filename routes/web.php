<?php
namespace App\Http\Controllers;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeeRequestController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/fee/view', [FeeController::class, 'viewFeeForm']);
Route::post('/fee/get', [FeeController::class, 'getFee']);

        
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gettoken', function () {
    return view('student/get_token');
});

Route::post('/fee-request', [FeeRequestController::class, 'store'])->name('fee.request');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
