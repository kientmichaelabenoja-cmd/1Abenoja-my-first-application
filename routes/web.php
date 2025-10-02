<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job; // Import the new Job Model [cite: 109, 113]

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with('employer')->paginate(2)  // Use the Job Model's all() method [cite: 119]
    ]);
});

// Single Job
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id) // Use the Job Model's find() method [cite: 123]
    ]);
});