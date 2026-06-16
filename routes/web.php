<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return 'Admin Dashboard';
})->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('cars', CarController::class);
    Route::resource('features', FeatureController::class);
    Route::patch(
        '/bookings/{booking}',
        [BookingController::class, 'update']
    )->name('bookings.update');
});

Route::middleware('auth')->group(function () {

    Route::get(
        '/bookings/create/{car}',
        [BookingController::class, 'create']
    )->name('bookings.create');

    Route::post(
        '/bookings',
        [BookingController::class, 'store']
    )->name('bookings.store');

    Route::get(
        '/bookings',
        [BookingController::class, 'index']
    )->name('bookings.index');

    Route::delete(
        '/bookings/{booking}',
        [BookingController::class, 'destroy']
    )->name('bookings.destroy');
});



require __DIR__ . '/auth.php';
