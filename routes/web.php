<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileConversionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Google Authentication Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [FileConversionController::class, 'showDashboard'])->name('dashboard');
    
    // PDF conversion routes
    Route::post('/convert/pdf-to-word', [FileConversionController::class, 'pdfToWord'])->name('convert.pdf-to-word');
    Route::post('/convert/word-to-pdf', [FileConversionController::class, 'wordToPdf'])->name('convert.word-to-pdf');
    
    // Image conversion routes
    Route::post('/convert/image-to-webp', [FileConversionController::class, 'imageToWebp'])->name('convert.image-to-webp');
    
    // Voice conversion routes
    Route::post('/convert/voice-to-text', [FileConversionController::class, 'voiceToText'])->name('convert.voice-to-text');
    Route::post('/convert/text-to-voice', [FileConversionController::class, 'textToVoice'])->name('convert.text-to-voice');
    
    // Payment routes - separate pages
    Route::get('/upgrade/premium', [PaymentController::class, 'showPremiumUpgrade'])->name('show.premium.upgrade');
    Route::get('/upgrade/limit', [PaymentController::class, 'showLimitUpgrade'])->name('show.limit.upgrade');
    Route::post('/payment/upgrade-premium', [PaymentController::class, 'upgradeToPremium'])->name('upgrade.premium');
    Route::post('/payment/increase-limit', [PaymentController::class, 'increaseLimitDonation'])->name('increase.limit');
    Route::get('/payment-history', [PaymentController::class, 'paymentHistory'])->name('payment-history');
    
    // Limit reached page
    Route::get('/limit-reached', [FileConversionController::class, 'limitReached'])->name('limit.reached');
});

// Super Admin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'superadmin'
])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('admin.approve-payment');
    Route::post('/reject-payment/{id}', [AdminController::class, 'rejectPayment'])->name('admin.reject-payment');
    Route::post('/update-user-role/{id}', [AdminController::class, 'updateUserRole'])->name('admin.update-user-role');
});
