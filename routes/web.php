<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix("/")->group(function () {
    Route::get("/", [HomeController::class, "index"]);
    Route::get("/about", [HomeController::class, "about"]);
    Route::get("/contact", [HomeController::class, "contact"])->name("contact");
    Route::get("/blog", [HomeController::class, "blog"]);
    Route::get("/blog-detail", [HomeController::class, "blogDetail"]);
});

// Admin Routes
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;

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
    });
});

Route::fallback(function () {
    return redirect('/');
});
