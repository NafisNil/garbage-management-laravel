<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BillController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/mobile-form', [FrontendController::class, 'mobile_form'])->name('mobile_form');
Route::get('/otp-form', [FrontendController::class, 'otp_form'])->name('otp_form');
Route::post('/mobile-form-store', [FrontendController::class, 'mobile_form_store'])->name('mobile_form_store');
Route::post('/otp-form-store', [FrontendController::class, 'otp_form_store'])->name('otp_form_store');
Route::get('/registration-successful', [FrontendController::class, 'registration_successful'])->name('registration_successful');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile-update', [FrontendController::class, 'profile_update'])->name('profile_update');
Route::post('/profile-update', [UserController::class, 'profile_update_store'])->name('profile_update_store');
Route::get('/user-dashboard', [UserController::class, 'user_dashboard'])->name('user_dashboard');
Route::get('/bill-payment-form', [UserController::class, 'bill_payment_form'])->name('bill_payment_form');
Route::post('/bill-store', [UserController::class, 'bill_store'])->name('bill_store');
Route::get('/bill-successful', [UserController::class, 'bill_successful'])->name('bill_successful');
});


Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('event-all', [EventController::class, 'all_event'])->name('event.all');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('bill-index', [BillController::class, 'index'])->name('bill.index');
    Route::resources([
      
      'general' => GeneralController::class,
      'event' => EventController::class
    ]);

});

require __DIR__.'/auth.php';
