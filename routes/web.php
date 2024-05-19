<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, "showLogin"]);
Route::post('/login', [LoginController::class, "authenticate"])->name("login");
Route::post('/logout', [LoginController::class, "logout"])->name("logout");

Route::prefix("/")->middleware("auth")->group(function () {
    Route::get('/', [DashboardController::class, "showDashboard"]);
    Route::get('/admin', [DashboardController::class, "showAdminDashboard"])->name("admin");
});
