<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Admin Routes
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;

Route::prefix("/")->group(function () {
    Route::get("/", [HomeController::class, "index"]);
    Route::get("/about", [HomeController::class, "about"]);
    Route::get("/contact", [HomeController::class, "contact"])->name("contact");
    Route::get("/blog", [BlogController::class, "index"]);
    Route::get("/blog/{slug}", [BlogController::class, "show"]);
});



Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Authenticated Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Offer CRUD
        Route::resource('offers', AdminController::class)->except(['index', 'show']);

        // Blog CRUD
        Route::get('blogs/models', [\App\Http\Controllers\Admin\AdminBlogController::class, 'getModels'])->name('blogs.models');
        Route::post('blogs/generate', [\App\Http\Controllers\Admin\AdminBlogController::class, 'generate'])->name('blogs.generate');
        Route::resource('blogs', \App\Http\Controllers\Admin\AdminBlogController::class);
    });

    Route::fallback(function () {
        return redirect('/admin');
    });
});

Route::fallback(function () {
    return redirect('/');
});
