<x-layout>
<x-slot:heading>
<div class="text-4xl sm:text-5xl font-extrabold tracking-tighter text-center glow-text">
Edit Job: {{ $job->title }}
</div>
</x-slot:heading>

<div class="max-w-3xl mx-auto p-8 bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl border border-purple-500/50">
    
    <header class="mb-8 pb-4 border-b border-purple-600/50">
        <h2 class="text-2xl font-bold text-white">Modify Job Details</h2>
        <p class="mt-1 text-purple-300">
            Update the information for this cosmic job listing.
        </p>
    </header>

    <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-8">
        @csrf
        @method('PATCH') 

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Job Title --}}
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-purple-300">Job Title</label>
                <input type="text" name="title" id="title" 
                    value="{{ old('title', $job->title) }}" {{-- Populated with existing data --}}
                    class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150"
                    required>
                @error('title')
                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Salary --}}
            <div>
                <label for="salary" class="block text-sm font-medium text-purple-300">Salary (Annual)</label>
                <input type="text" name="salary" id="salary" 
                    value="{{ old('salary', $job->salary) }}" {{-- Populated with existing data --}}
                    class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150"
                    required>
                @error('salary')
                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Employer Selection --}}
            <div>
                <label for="employer_id" class="block text-sm font-medium text-purple-300">Employer</label>
                <select name="employer_id" id="employer_id" required
                    class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150">
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}" 
                            {{ old('employer_id', $job->employer_id) == $employer->id ? 'selected' : '' }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id')
                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="pt-4 border-t border-purple-600/50">
            <label for="tags" class="block text-sm font-medium text-purple-300">Tags (Comma Separated)</label>
            <p class="text-xs text-purple-400 mb-2">Help applicants find your job with relevant keywords.</p>
            <input type="text" name="tags" id="tags" 
                value="{{ old('tags', $job->tags->pluck('name')->implode(', ')) }}" {{-- Populated with existing tags --}}
                class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150"
                placeholder="e.g., laravel, remote, php, full-stack">
            @error('tags')
                <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="flex justify-between items-center pt-4 border-t">
            <div></div>
            <div class="flex space-x-4">
                <a href="/jobs/{{ $job->id }}"
                    class="inline-flex items-center px-4 py-2 border border-purple-500/50 text-sm font-medium rounded-lg text-purple-300 hover:text-white hover:bg-white/10 transition duration-150 ease-in-out">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex justify-center rounded-lg bg-purple-600 px-5 py-2 text-sm font-semibold text-white shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out transform hover:scale-[1.02]">
                    Save
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit"
            onclick="return confirm('Are you sure you want to delete this job? This action cannot be undone.')"
            class="inline-flex items-center text-sm font-medium text-red-400 hover:text-red-500 transition duration-150 ease-in-out">
            Delete Job
        </button>
    </form>
</div>

</x-layout>