<x-layout>
    <x-slot:heading>
        <div class="text-4xl sm:text-5xl font-extrabold tracking-tighter text-center glow-text">
            Post a Cosmic Opportunity
        </div>
    </x-slot:heading>

    {{-- Main Form Card (Now with Cosmic Styling) --}}
    <div class="max-w-3xl mx-auto p-8 bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl border border-purple-500/50">
        
        {{-- Form Header --}}
        <header class="mb-8 pb-4 border-b border-purple-600/50">
            <h2 class="text-2xl font-bold text-white">Job Details</h2>
            <p class="mt-1 text-purple-300">
                Provide the essential information for your intergalactic job opening.
            </p>
        </header>

        <form method="POST" action="/jobs" class="space-y-8">
            @csrf

            {{-- Input Group 1: Core Details --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Job Title --}}
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-purple-300">Job Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150"
                        placeholder="e.g., Lead Martian Web Developer" required>
                    @error('title')
                        <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Salary --}}
                <div>
                    <label for="salary" class="block text-sm font-medium text-purple-300">Salary (Annual)</label>
                    <input type="text" name="salary" id="salary" value="{{ old('salary') }}"
                        class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150"
                        placeholder="$120,000 - $160,000" required>
                    @error('salary')
                        <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Employer Selection --}}
                <div>
                    <label for="employer_id" class="block text-sm font-medium text-purple-300">Employer</label>
                    <select name="employer_id" id="employer_id" required
                        class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150">
                        {{-- Add a disabled placeholder option for better UX --}}
                        <option value="" disabled selected>Select an Employer...</option> 
                        @foreach ($employers as $employer)
                            <option value="{{ $employer->id }}" 
                                {{ old('employer_id') == $employer->id ? 'selected' : '' }}>
                                {{ $employer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employer_id')
                        <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Input Group 2: Tags --}}
            <div class="pt-4 border-t border-purple-600/50">
                <label class="block text-sm font-medium text-purple-300 mb-2">Tags</label>
                <p class="text-xs text-purple-400 mb-2">Select one or more tags for this job.</p>
                <div class="flex flex-wrap gap-3">
                    @foreach ($tags as $tag)
                        <label class="inline-flex items-center space-x-2 bg-purple-100/70 rounded px-2 py-1">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="accent-purple-600"
                                {{ collect(old('tags', []))->contains($tag->id) ? 'checked' : '' }}>
                            <span class="text-purple-700 text-sm">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end space-x-4 pt-4">
                {{-- Cancel Button --}}
                <a href="/jobs"
                    class="inline-flex items-center px-4 py-2 border border-purple-500/50 text-sm font-medium rounded-lg text-purple-300 hover:text-white hover:bg-white/10 transition duration-150 ease-in-out">
                    Cancel
                </a>
                
                {{-- Submit Button (Themed) --}}
                <button type="submit"
                    class="inline-flex justify-center rounded-lg bg-purple-600 px-5 py-2 text-sm font-semibold text-white shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out transform hover:scale-[1.02]">
                    <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>
</x-layout>