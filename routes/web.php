<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, "handleIndex"]);

Route::get('/login', [LoginController::class, "showLogin"])->name("login.screen");
Route::get('/register', [UserController::class, "showRegister"]);

Route::post('/authenticate', [LoginController::class, "authenticate"])->name("login");
Route::post('/logout', [LoginController::class, "logout"])->name("logout");

Route::post('/register', [UserController::class, "createUser"])->name("register");

Route::prefix("/")->middleware("auth")->group(function () {

    Route::prefix("/admin")->name("admin")->group(function () {
        Route::get('/books', [BookController::class, "showBooksDashboard"])->name(".books");

        Route::get('/books/add', [BookController::class, "addBookDashboard"])->name(".books.add");
        Route::post('/books/add', [BookController::class, "addBookSave"])->name(".books.add.save");

        Route::get('/books/edit/{id}', [BookController::class, "editBookDashboard"])->name(".books.edit");
        Route::post('/books/edit/save/{id}', [BookController::class, "editBookSave"])->name(".books.edit.save");

        Route::post('/books/delete/{id}', [BookController::class, "deleteBook"])->name(".books.delete");
    });
    
    Route::get('/dashboard', [DashboardController::class, "showDashboard"])->name("dashboard");

    Route::get('/books/list', [BookController::class, "showBooksToLoan"])->name("books.list");
    Route::post('/books/list/search', [BookController::class, "getBooksToLoan"])->name("books.list.search");
    
    Route::get('/loans/book/{id}', [LoanController::class, "showLoanBook"])->name("loan.book");
    Route::post('/loans/book/{id}', [LoanController::class, "loanBook"])->name("loan.book.save");
    Route::post('/loans/return/{id}', [LoanController::class, "returnBook"])->name("loan.book.return");

});
