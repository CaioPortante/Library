<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, "showLogin"]);
Route::post('/login', [LoginController::class, "authenticate"])->name("login");
Route::post('/logout', [LoginController::class, "logout"])->name("logout");

Route::get('/register', [UserController::class, "showRegister"]);
Route::post('/register', [UserController::class, "createUser"])->name("register");

Route::prefix("/")->middleware("auth")->group(function () {
    Route::get('/', [DashboardController::class, "showDashboard"]);
    Route::get('/admin', [DashboardController::class, "showAdminDashboard"])->name("admin");
});
