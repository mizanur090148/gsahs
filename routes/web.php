<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AccountController, NewsAndGallaryController, AlumniController, ContactController, DonationController, HomeController, NewsController, RegisteredController, StudentController, BlogController, ExpenseController};

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Student Registration
Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/all', [StudentController::class, 'all'])->name('students.all');
});

// Alumni Directory
Route::prefix('alumni')->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/all', [AlumniController::class, 'all'])->name('alumni.all');
});

// News Section
Route::prefix('news')->group(function () {
    Route::get('/', [NewsAndGallaryController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsAndGallaryController::class, 'show'])->name('news.show');
});

Route::get('galary', [NewsAndGallaryController::class, 'galary'])->name('galary');

// Blog Section
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
});

Route::prefix('registered-students')->group(function () {
    Route::get('/', [RegisteredController::class, 'index'])->name('registered-students.index');
    Route::get('/all', [RegisteredController::class, 'all'])->name('registered-students.show');
});

// Expenses Section
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Contact Section
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/send', [ContactController::class, 'send'])->name('contact.send');
});

// Account/Financial Section
Route::prefix('account')->group(function () {
    //Route::get('/', [AccountController::class, 'index'])->name('account.index');
});

// Donation Section
Route::prefix('donate')->group(function () {
    Route::get('/', [DonationController::class, 'index'])->name('donate.index');
    Route::post('/', [DonationController::class, 'store'])->name('donate.store');
});
