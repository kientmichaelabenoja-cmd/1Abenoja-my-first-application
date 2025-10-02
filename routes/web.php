<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Homepage
Route::get('/', function () {
    return view('home');
});

// About page
Route::view('/about', 'about')->name('about');

// Contact page
Route::view('/contact', 'contact')->name('contact');

// Resource routes for jobs
Route::resource('jobs', JobController::class)->names([
    'index' => 'jobs.index',
    'create' => 'jobs.create',
    'store' => 'jobs.store',
    'show' => 'jobs.show',
    'edit' => 'jobs.edit',
    'update' => 'jobs.update',
    'destroy' => 'jobs.destroy',
]);
