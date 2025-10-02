<?php

use Illuminate\Support\Facades\Route;

// Home Page Route
Route::get('/', function () {
    return view('home');
});

// About Page Route
Route::get('/about', function () {
    return view('about');
});

// Contact Page Route
Route::get('/contact', function () {
    return view('contact');
});