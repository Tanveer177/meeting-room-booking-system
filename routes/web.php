<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookingController;




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
    return view('auth.login');
});

Auth::routes();


Route::resource('bookings', 'App\Http\Controllers\BookingController');
Route::get('/home', [BookingController::class, 'index'])->name('home');
Route::get('/booking', [BookingController::class, 'create'])->name('booking');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');


// Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
// routes/web.php
// Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::resource('employees', 'App\Http\Controllers\EmployeeController');

// Route::resource('employees', 'EmployeeController');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');



