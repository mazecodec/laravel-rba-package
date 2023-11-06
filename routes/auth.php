<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
        /**
         * Login
         */
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        /**
         * Forgot password
         */
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name(
                'password.request'
            );
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name(
                'password.email'
            );

        /**
         * Reset Password
         */
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name(
                'password.reset'
            );
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name(
                'password.store'
            );
    });

Route::middleware('auth')->group(function () {
        /**
         * Verify emails
         */
        Route::get('verify-email', EmailVerificationPromptController::class)->name(
                'verification.notice'
            );
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(
                ['signed', 'throttle:6,1']
            )->name('verification.verify');
        Route::post(
            'email/verification-notification',
            [EmailVerificationNotificationController::class, 'store']
        )->middleware('throttle:6,1')->name('verification.send');

        /**
         * Confirm password
         */
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name(
                'password.confirm'
            );
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        /**
         * Logout
         */
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        /**
         * Profile
         */
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::prefix('dashboard')->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('/client', [HomeController::class, 'index'])
                     ->middleware(['role.client'])
                     ->name('dashboard.client');
            });

        /**
         * Admin and Agent's routes
         */
        Route::middleware('role.admin-agent')->group(function () {
                /**
                 * User registration
                 */
                Route::get('register', [RegisteredUserController::class, 'create'])->name(
                        'register'
                    );
                Route::post('register', [RegisteredUserController::class, 'store']);

                Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
                        'profile.destroy'
                    );

                /**
                 * User resource's routes
                 */
                Route::resource('users', UserController::class);

                /**
                 * Admin's routes
                 */
                Route::middleware('role.admin')->group(function () {
                        Route::resource('messages', MessageController::class);
                    });
            });

        /**
         * Client's routes
         */
        Route::middleware('role.client')->group(function () {
                Route::resource('documents', UserDocumentController::class);
                Route::get('dropzone', [DropzoneController::class, 'index'])->name('dropzone');
                Route::post('dropzone', [DropzoneController::class, 'store'])->name(
                    'dropzone.store'
                );
            });
    });
