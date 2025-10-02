<x-layout>
    <x-slot:heading>
        <h2>Jobs Page</h2>
    </x-slot:heading>

    <div class="bg-white/5 p-8 rounded-xl max-w-4xl mx-auto border border-purple-500/50">
        <ul class="space-y-4">
            @foreach ($jobs as $job)
                <li class="p-3 hover:bg-white/10 rounded-lg transition duration-200">
                    <a href="/jobs/{{ $job->id }}" class="text-purple-200 hover:text-white block">
                        
                        <!-- Employer Name is still on its own line for separation -->
                        <div class="font-bold text-purple-400 text-sm mb-1">
                            {{ $job->employer->name }}
                        </div>
                        
                        <!-- NEW FLEX CONTAINER: Job Details and Tags side-by-side -->
                        <div class="flex items-center space-x-4">
                            
                            <!-- 1. JOB TITLE AND SALARY -->
                            <div class="flex-shrink-0">
                                <strong class="text-xl glow-text">{{ $job->title }}:</strong> 
                                <span class="text-lg">Pays {{ $job->salary }} per year.</span>
                            </div>

                            <!-- 2. TAGS (Pushes to the right) -->
                            <div class="ml-auto flex flex-wrap justify-end space-x-2">
                                @foreach ($job->tags as $tag)
                                    <span class="inline-flex items-center rounded-full bg-gray-600/50 px-2 py-0.5 text-xs font-medium text-gray-300">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <!-- END FLEX CONTAINER -->
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
