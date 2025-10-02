<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    // Method to return all hardcoded jobs
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];
    }

    // Method to find a single job by its ID
    public static function find($id)
    {
        // Get all jobs
        $jobs = static::all();

        // Search the array for a job where the 'id' matches the requested $id
        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

        // If no job is found, abort the request and show a 404 page
        if (! $job) {
            abort(404);
        }
        
        return $job;
    }
}