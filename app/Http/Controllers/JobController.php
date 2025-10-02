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
    /**
     * Display a listing of jobs.
     */
    public function index()
    {
    $jobs = Job::with(['employer', 'tags'])->paginate(2);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('jobs.create', [
            'employers' => Employer::all(),
            'tags' => Tag::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'salary' => ['required', 'numeric', 'min:0'],
            'employer_id' => ['required', Rule::exists('employers', 'id')],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => [Rule::exists('tags', 'id')]
        ]);

        $job = Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => $validated['employer_id'],
            'description' => $validated['description'] ?? null,
            'user_id' => Auth::id(), // attach job to logged-in user
        ]);

        if (!empty($validated['tags'])) {
            $job->tags()->attach($validated['tags']);
        }

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {


        return view('jobs.edit', [
            'job' => $job,
            'employers' => Employer::all(),
            'tags' => Tag::all()->sortBy('name')
        ]);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {


        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric', 'min:0'],
            'employer_id' => ['required', Rule::exists('employers', 'id')],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => [Rule::exists('tags', 'id')],
        ]);


        $job->update($validated);

        if (array_key_exists('tags', $validated)) {
            if (!empty($validated['tags'])) {
                $job->tags()->sync($validated['tags']);
            } else {
                $job->tags()->detach();
            }
        }

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {


        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
