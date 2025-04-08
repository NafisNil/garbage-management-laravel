<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\ScheduleController;
use  App\Http\Controllers\DustController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/mobile-form', [FrontendController::class, 'mobile_form'])->name('mobile_form');
Route::get('/otp-form', [FrontendController::class, 'otp_form'])->name('otp_form');
Route::post('/mobile-form-store', [FrontendController::class, 'mobile_form_store'])->name('mobile_form_store');
Route::post('/otp-form-store', [FrontendController::class, 'otp_form_store'])->name('otp_form_store');
Route::get('/registration-successful', [FrontendController::class, 'registration_successful'])->name('registration_successful');
//vendor
Route::get('/vendor-registration', [FrontendController::class, 'vendor_registration'])->name('vendor_registration');
Route::post('/vendor-registration-store', [FrontendController::class, 'vendor_registration_store'])->name('vendor_registration_store');
Route::get('/vendor-registration-successful', [FrontendController::class, 'vendor_registration_successful'])->name('vendor_registration_successful');
Route::get('/vendor-login', [FrontendController::class, 'vendor_login'])->name('vendor_login');
Route::post('/vendor-login-store', [FrontendController::class, 'vendor_login_store'])->name('vendor_login_store');
Route::get('/vendor-otp-form', [FrontendController::class, 'vendor_otp_form'])->name('vendor_otp_form');
Route::post('/vendor-otp-form-store', [FrontendController::class, 'vendor_otp_form_store'])->name('vendor_otp_form_store');

Route::middleware(['auth', 'user'])->group(function () {
Route::get('/profile-update', [FrontendController::class, 'profile_update'])->name('profile_update');
Route::post('/profile-update', [UserController::class, 'profile_update_store'])->name('profile_update_store');
Route::get('/user-dashboard', [UserController::class, 'user_dashboard'])->name('user_dashboard');
Route::get('/bill-payment-form', [UserController::class, 'bill_payment_form'])->name('bill_payment_form');
Route::post('/bill-store', [UserController::class, 'bill_store'])->name('bill_store');
Route::get('/bill-successful', [UserController::class, 'bill_successful'])->name('bill_successful');
Route::get('/donate-payment-form', [UserController::class, 'donate_payment_form'])->name('donate_payment_form');
Route::post('/donate-store', [DonationController::class, 'store'])->name('donate_store');
Route::get('/donation-successful', [UserController::class, 'donation_successful'])->name('donation_successful');
Route::get('/weekly-schedule', [UserController::class, 'weekly_schedule'])->name('weekly_schedule');
Route::get('/complain-first', [UserController::class, 'complain_first'])->name('complain_first');
Route::post('/complain-store', [UserController::class, 'complain_store'])->name('complain_store');
Route::get('/complain-second/', [UserController::class, 'complain_second'])->name('complain_second');
Route::post('/complain-update', [UserController::class, 'complain_update'])->name('complain_update');
Route::get('/complain-successful/', [UserController::class, 'complain_successful'])->name('complain_successful');
Route::get('/complain-track/{id}', [UserController::class, 'complain_track'])->name('complain_track');
});


Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('event-all', [EventController::class, 'all_event'])->name('event.all');
    Route::get('event-details/{id}', [EventController::class, 'single_event'])->name('event.details');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('bill-index', [BillController::class, 'index'])->name('bill.index');
    Route::get('complain-index', [AdminController::class, 'complain_index'])->name('complain.index');
    Route::get('complain-assigned/{id}', [AdminController::class, 'complain_assigned'])->name('complain.assigned');
  //  Route::get('complain-processed/{id}', [AdminController::class, 'complain_processed'])->name('complain.processed');
    Route::get('complain-completed/{id}', [AdminController::class, 'complain_completed'])->name('complain.completed');

    Route::get('vendor-index', [AdminController::class, 'vendor_index'])->name('vendor.index');
    Route::get('vendor-approve/{id}', [AdminController::class, 'vendor_approve'])->name('vendor.approve');
    Route::get('vendor-reject/{id}', [AdminController::class, 'vendor_reject'])->name('vendor.reject');
    Route::delete('vendor-delete/{id}', [AdminController::class, 'vendor_delete'])->name('vendor.delete');

    Route::resources([
      
      'general' => GeneralController::class,
      'event' => EventController::class,
      'organization' => OrganizationController::class,
      'donation' => DonationController::class,
      'truck' => TruckController::class,
      'schedule' => ScheduleController::class,
      'dust' => DustController::class,
    ]);

});


Route::middleware('auth', 'ci')->group(function () {
  Route::get('vendor-bill-index', [VendorController::class, 'bill_index'])->name('vendor.bill.index');
  Route::get('vendor-bill-create', [VendorController::class, 'bill_create'])->name('vendor.bill.create');
  Route::post('vendor-bill-store', [VendorController::class, 'bill_store'])->name('vendor.bill.store');
  Route::get('vendor-bill-edit/{id}', [VendorController::class, 'bill_edit'])->name('vendor.bill.edit');
  Route::PUT('vendor-bill-update/{id}', [VendorController::class, 'bill_update'])->name('vendor.bill.update');
  Route::DELETE('vendor-bill-delete/{id}', [VendorController::class, 'bill_destroy'])->name('vendor.bill.delete');


});

require __DIR__.'/auth.php';
