<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use App\Http\Controllers\JobController;

// Homepage
Route::get('/', function () {
    return view('home');
});

Route::resource('jobs', JobController::class);

// All Jobs
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with(['employer', 'tags'])->paginate(2)
    ]);
});

// Display Create Job Form
Route::get('jobs/create', function () {
    return view('jobs.create', [
        'employers' => Employer::all(),
       
    ]); 
});

Route::post('/jobs', function () {
    // 1. Validate the form data
    $validated = request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required'],
        'employer_id' => ['required'], 
        'tags' => ['nullable', 'string'] 
    ]);

    $job = Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => $validated['employer_id']
    ]);

    if ($validated['tags']) {
        $tags = explode(',', $validated['tags']);
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }
        $job->tags()->attach($tagIds);
    }

    return redirect('/jobs');
});


// Single Job (Read)
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
});


Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
    ]);
});


Route::patch('/jobs/{job}', function (Job $job) {
    $validated = request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required'],
        'employer_id' => ['required'],
        'tags' => ['nullable', 'string']
    ]);

    // 2. Update the job record using the validated data
    $job->update($validated);
    
    // 3. Handle tags update (using sync for update logic)
    if (request()->filled('tags')) {
        $tags = explode(',', $validated['tags']);
        $tagIds = [];
        
        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }
        // Sync replaces all existing tags with the new set
        $job->tags()->sync($tagIds); 
    } else {
        // If the tags field is empty, detach all existing tags
        $job->tags()->detach();
    }


    // 4. Redirect the user back to the job's detail page
    return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
});

// D (Delete) - Handle job deletion
Route::delete('/jobs/{job}', function (Job $job) {
    // Delete the job from the database
    $job->delete();

    // Redirect the user back to the main jobs list
    return redirect('/jobs')->with('success', 'Job deleted successfully!');
});