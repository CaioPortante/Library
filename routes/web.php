<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
    return view('dashboard'); 
})->middleware("auth");


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, "authenticate"])->name("login");
Route::post('/logout', [LoginController::class, "logout"])->name("logout");

Route::prefix("dashboard")->middleware("auth")->name("dashboard.")->group(function () {
    
});
