<?php
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\TutorController;
use App\Http\Controllers\User\PartnerController;
use App\Http\Controllers\User\LombaController;
use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Route;

// Welcome/Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout route (POST method for security)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth.user')->name('logout');

// User Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// AJAX endpoint for loading more lomba
Route::get('/home/load-more', [HomeController::class, 'loadMoreLomba'])->name('home.loadMoreLomba');

// Route untuk tutor/mentor
Route::get('/info-tutor', [TutorController::class, 'index'])->name('info.tutor');
Route::get('/info-tutor/{id}', [TutorController::class, 'showProfile'])->name('tutor.profile');
Route::get('/api/tutor/slots', [TutorController::class, 'getAvailableSlots'])->name('tutor.slots');

// Partner Routes
Route::get('/partner-lomba', [PartnerController::class, 'index'])->name('partner.lomba');
Route::get('/partner-lomba/{id}', [PartnerController::class, 'show'])->name('partner.detail');

// Lomba Routes
Route::get('/lomba', [LombaController::class, 'index'])->name('lomba.index');
Route::get('/lomba/{id}', [LombaController::class, 'show'])->name('lomba.detail');

// Lomba Registration Route (Protected)
Route::middleware('auth.user')->group(function() {
    Route::get('/lomba/{id}/daftar', [LombaController::class, 'showRegistrationForm'])->name('lomba.register');
    Route::post('/lomba/{id}/daftar', [LombaController::class, 'register'])->name('lomba.register.submit');

    // Add other protected routes here
});
