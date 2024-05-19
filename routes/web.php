<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome'); // Initial Laravel Page
    return view('index');
});
