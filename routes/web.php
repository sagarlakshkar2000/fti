<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix("/")->group(function () {
    Route::get("/", [HomeController::class, "index"]);
    Route::get("/about", [HomeController::class, "about"]);
    Route::get("/contact", [HomeController::class, "contact"]);
    Route::get("/blog", [HomeController::class, "blog"]);
    Route::get("/blog-detail", [HomeController::class, "blogDetail"]);
});
