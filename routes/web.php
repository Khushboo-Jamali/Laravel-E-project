<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('about', function () {
    return view('frontend.about');
});
Route::get('clothe', function () {
    return view('frontend.clothe');
});
Route::get('contact', function () {
    return view('frontend.contact');
});


Route::get('employee/signup', [EmployeeController::class, 'showSignupForm'])->name('employee.signup');
Route::post('employee/signup', [EmployeeController::class, 'processSignup']);


Route::prefix('employee')->name('employee.')->group(function () {
    // Show the login form
    Route::get('login', [EmployeeController::class, 'showLoginForm'])->name('login');

    // Handle login submission
    Route::post('login', [EmployeeController::class, 'login'])->name('login.post');

    // Logout route
    Route::post('logout', [EmployeeController::class, 'logout'])->name('logout');

    // Employee dashboard route
    Route::get('dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
});
// Dashboard Route (can be handled in EmployeeController)
Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');

// Profile Route (assumed that EmployeeController handles the profile logic)
Route::get('/profile', [EmployeeController::class, 'profile'])->name('user.profile');

// Logout Route (if EmployeeController handles logout as well)
Route::post('/logout', [EmployeeController::class, 'logout'])->name('logout');
