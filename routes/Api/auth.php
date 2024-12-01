<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\PromotionController;
use App\Http\Middleware\EnsureIsAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:api', 'locale', 'xss'])->group(function () {

    Route::middleware('guest')->group(function () {
        Route::post('/verificationCode/send', [VerificationCodeController::class, 'Send'])->middleware('throttle:send_confirmation_code')->name('verificationCode.check');

        Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:register')->name('register');

        Route::post('/verificationCode/check', [VerificationCodeController::class, 'Check'])->name('verificationCode.check');

        Route::post('/password/forget', [PasswordController::class, 'Forget'])->middleware('throttle:change_password')->name('forget_password');

        Route::post('/login', [AuthController::class, 'login'])->name('login');

    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::put('/update', [AuthController::class, 'update'])->name('update');
        Route::post('/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
    });

    Route::middleware(['auth:sanctum', EnsureIsAdmin::class])->group(function () {
        Route::post('/promotions', [PromotionController::class, 'promote'])->name('promote');
        Route::get('/promotions', [PromotionController::class, 'index'])->name('Promotions.index');
    });

});