<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicUserController;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Laravel authentication routes
Auth::routes();

// Authenticated home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ Public User Registration Routes
Route::get('/register-user', [PublicUserController::class, 'showForm'])->name('register.form');
Route::post('/register-user', [PublicUserController::class, 'register'])->name('register.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
