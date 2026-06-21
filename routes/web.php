<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {

return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::get('/dashboard', [DashboardController::class, 'client'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');
/*
|--------------------------------------------------------------------------
| Cars (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/cars/create', [CarController::class, 'create'])
        ->name('cars.create');

    Route::post('/cars', [CarController::class, 'store'])
        ->name('cars.store');

    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])
        ->name('cars.edit');

    Route::put('/cars/{car}', [CarController::class, 'update'])
        ->name('cars.update');

    Route::delete('/cars/{car}', [CarController::class, 'destroy'])
        ->name('cars.destroy');

});

/*
|--------------------------------------------------------------------------
| Cars (Client + Admin)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/cars', [CarController::class, 'index'])
        ->name('cars.index');

    Route::get('/cars/{car}', [CarController::class, 'show'])
        ->name('cars.show');

});

/*
|--------------------------------------------------------------------------
| Features (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/features', [FeatureController::class, 'index'])
        ->name('features.index');

    Route::get('/features/create', [FeatureController::class, 'create'])
        ->name('features.create');

    Route::post('/features', [FeatureController::class, 'store'])
        ->name('features.store');

    Route::get('/features/{feature}', [FeatureController::class, 'show'])
        ->name('features.show');

    Route::get('/features/{feature}/edit', [FeatureController::class, 'edit'])
        ->name('features.edit');

    Route::put('/features/{feature}', [FeatureController::class, 'update'])
        ->name('features.update');

    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])
        ->name('features.destroy');

});

/*
|--------------------------------------------------------------------------
| Bookings
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/bookings', [BookingController::class, 'index'])
        ->name('bookings.index');

    Route::get('/bookings/create/{car}', [BookingController::class, 'create'])
        ->name('bookings.create');

    Route::post('/bookings', [BookingController::class, 'store'])
        ->name('bookings.store');

    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])
        ->name('bookings.destroy');

});

/*
|--------------------------------------------------------------------------
| Booking Status (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])
        ->name('bookings.update');

});

require __DIR__.'/auth.php';
