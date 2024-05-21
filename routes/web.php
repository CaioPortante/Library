<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, "showLogin"]);
Route::post('/login', [LoginController::class, "authenticate"])->name("login");
Route::post('/logout', [LoginController::class, "logout"])->name("logout");

Route::get('/register', [UserController::class, "showRegister"]);
Route::post('/register', [UserController::class, "createUser"])->name("register");

Route::prefix("/")->middleware("auth")->group(function () {

    Route::prefix("/admin")->name("admin")->group(function () {
        Route::get('/', [DashboardController::class, "showAdminDashboard"]);

        Route::get('/books', [BookController::class, "showBooksDashboard"])->name(".books");
        Route::get('/books/edit/{id}', [BookController::class, "editBookDashboard"])->name(".books.edit");
        Route::post('/books/edit/save/{id}', [BookController::class, "editBookSave"])->name(".books.edit.save");
    });
    
    Route::get('/', [DashboardController::class, "showDashboard"]);

    Route::get('/books/list', [BookController::class, "showBooksToLoan"])->name("books.list");
    Route::get('/loans/book/{id}', [LoanController::class, "showLoanBook"])->name("loan.book");
    Route::post('/loans/book/{id}', [LoanController::class, "loanBook"])->name("loan.book.save");
    Route::post('/loans/return/{id}', [LoanController::class, "returnBook"])->name("loan.book.return");
    

});
