<x-layout>
    <x-slot:heading>
       <h2>Jobs Page</h2>
    </x-slot:heading>

    <div class="bg-white/5 p-8 rounded-xl max-w-4xl mx-auto border border-purple-500/50">
        <ul class="space-y-4">
            @foreach ($jobs as $job)
                <li class="p-3 hover:bg-white/10 rounded-lg transition duration-200">
                    <a href="/jobs/{{ $job['id'] }}" class="text-purple-200 hover:text-white block">
                        <strong class="text-xl glow-text">{{ $job['title'] }}:</strong> 
                        <span class="text-lg">Pays {{ $job['salary'] }} per year.</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>