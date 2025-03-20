<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/mobile-form', [FrontendController::class, 'mobile_form'])->name('mobile_form');
Route::post('/mobile-form-store', [FrontendController::class, 'mobile_form_store'])->name('mobile_form_store');
Route::get('/otp-form', [FrontendController::class, 'otp_form'])->name('otp_form');

Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resources([
      
      'general' => GeneralController::class,
      'event' => EventController::class,
       
    ]);

});

require __DIR__.'/auth.php';
