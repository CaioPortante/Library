<?php

use App\Http\Controllers\BookController;
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

    Route::prefix("/admin")->name("admin")->group(function () {
        Route::get('/', [DashboardController::class, "showAdminDashboard"]);

        Route::get('/books', [BookController::class, "showBooksDashboard"])->name(".books");
        Route::get('/books/edit/{id}', [BookController::class, "editBookDashboard"])->name(".books.edit");
    });
});
