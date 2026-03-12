<?php
namespace App\Http\Controllers;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeRequestController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


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

Route::get('/view_serial', [FeeRequestController::class, 'studentIndex']);

Route::post('/fee-request', [FeeRequestController::class, 'store'])->name('fee.request');
Route::get('/payment-history', [FeeRequestController::class, 'paymentHistory'])->name('payment.history');
Route::get('/invoice/{id}', [FeeRequestController::class, 'downloadInvoice'])->name('invoice.download');


Route::get('/pay_online', function () {return view('student/pay_online');});
Route::post('/pay', [PaymentController::class,'pay'])->name('pay');
Route::post('/success', [PaymentController::class,'success'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/fail', [PaymentController::class,'fail'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/cancel', [PaymentController::class,'cancel'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('/online-payment-history',[PaymentController::class,'history'])->name('payment.history');

Route::get('/student-dashboard',[DashboardController::class,'index'])
->middleware('auth')
->name('student.dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
