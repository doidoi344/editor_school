<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;
use App\Http\Controllers\LoginWithGoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 一般ユーザー用
Route::get('/', [TopController::class, 'index'])->name('top');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Google認証
Route::get("auth/google", [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get("auth/google/callback", [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve');
    Route::get('/reservations/{userId}/index', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/eventsIndex', [ReservationController::class, 'eventsIndex'])->name('reservations.eventsIndex'); 
    Route::post('/reservations/destroy', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
});



require __DIR__.'/auth.php';

// admin用のルート
require __DIR__.'/admin.php';
// 追加




