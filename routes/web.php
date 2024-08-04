<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Livewire\RentalForm;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('cars', CarController::class);

Route::resource('rentals', RentalController::class)->middleware('auth')->except(['edit', 'update', 'destroy']);
Route::post('rentals/{id}/return', [RentalController::class, 'returnCar'])->middleware('auth')->name('rentals.return');

Route::get('/rental/form/{car}', RentalForm::class)->name('rental.form')->middleware('auth');
Route::post('/rental/submit', [RentalController::class, 'submitRentalForm'])->name('rental.submit')->middleware('auth');

Route::post('/rental/return/{id}', [RentalController::class, 'returnRental'])->name('rental.return');

require __DIR__.'/auth.php';
