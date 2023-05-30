<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ReservationManagementController;
use App\Http\Controllers\Admin\CourseManagementController;
use Illuminate\Support\Facades\Route;


// Route::get('/admin', function () {
//     return view('admin.welcome');
// });

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/main', [MainController::class, 'index'])->name('main');
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::post('/users/destroy', [UserManagementController::class, 'destroy'])->name('users.destroy');
        Route::get('/reservations/index', [ReservationManagementController::class, 'index'])->name('reservations.index');
        Route::post('/reservations/destroy', [ReservationManagementController::class, 'destroy'])->name('reservations.destroy');
        Route::get('/courses', [CourseManagementController::class, 'index'])->name('courses.index');
        Route::get('/courses/{id}/edit', [CourseManagementController::class, 'edit'])->name('courses.edit');
        Route::post('/courses/{id}/update', [CourseManagementController::class, 'update'])->name('courses.update');
        Route::get('/courses/{id}/destroy', [CourseManagementController::class, 'destroy'])->name('courses.destroy');
        Route::get('/courses/create', [CourseManagementController::class, 'create'])->name('courses.create');
        Route::post('/courses/store', [CourseManagementController::class, 'store'])->name('courses.store');
    });
    // 新規ユーザー登録・ログイン処理
    Route::middleware('guest:admin')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('verify-email', EmailVerificationPromptController::class)
                    ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                    ->middleware(['signed', 'throttle:6,1'])
                    ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware('throttle:6,1')
                    ->name('verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    });
});