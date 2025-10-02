<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer; 
use App\Models\Tag;       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    // Assuming index(), create(), store(), and show() methods are here...
    // ...

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        // AUTHORIZATION CHECK: Ensure the logged-in user owns this job
        if (!Auth::check() || Auth::user()->id !== $job->user_id) {
            abort(403); // Forbidden
        }
        
        // Fetch necessary data
        $employers = Employer::all(); 
        $tags = Tag::all()->sortBy('name'); // Fetch all available tags for the checkbox list

        return view('jobs.edit', [
            'job' => $job,
            'employers' => $employers,
            'tags' => $tags // Pass tags to the view
        ]);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        // AUTHORIZATION CHECK: Ensure the logged-in user owns this job
        if (!Auth::check() || Auth::user()->id !== $job->user_id) {
            abort(403); // Forbidden
        }
        
        // 1. Validate the incoming data (Updated for description and array tags)
        $validatedAttributes = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric', 'min:0'], 
            'employer_id' => ['required', Rule::exists('employers', 'id')],
            'description' => ['nullable', 'string'], // New field validation
            'tags' => ['nullable', 'array'], // Expect an array of tag IDs
            'tags.*' => ['nullable', Rule::exists('tags', 'id')], // Ensure each ID is a valid tag
        ]);

        // 2. Update the job record
        // FIX: Excluding 'tags' from mass assignment
        $job->update($request->except('tags'));
        
        // 3. Handle tags update (using array of IDs)
        if ($request->has('tags')) {
            // sync() is used here to update: detach old tags, attach new ones based on the array of IDs
            $job->tags()->sync($request->input('tags')); 
        } else {
            // If no checkboxes were checked, detach all existing tags
            $job->tags()->detach();
        }

        // 4. Redirect the user back to the job's detail page
        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        // AUTHORIZATION CHECK: Ensure the logged-in user owns this job
        if (!Auth::check() || Auth::user()->id !== $job->user_id) {
            abort(403); // Forbidden
        }
        
        // Delete the job from the database
        $job->delete();

        // Redirect the user back to the main jobs list
        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }
}
