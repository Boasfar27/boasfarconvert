<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileConversionController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

// Google Authentication Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

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
});
