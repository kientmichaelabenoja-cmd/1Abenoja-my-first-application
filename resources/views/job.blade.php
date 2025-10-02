<x-layout>
    <x-slot:heading>
        <h2>Jobs Details</h2>
    </x-slot:heading>

    <div class="bg-white/5 p-8 rounded-xl max-w-4xl mx-auto border border-purple-500/50">
        <h2 class="text-3xl font-bold mb-3">{{ $job['title'] }}</h2>
        <p class="text-xl text-purple-300">
            This job pays **{{ $job['salary'] }}** per year.
        </p>
        <p class="mt-6">
            <a href="/jobs" class="text-purple-400 hover:text-purple-300 underline transition duration-300">
                &larr; Back to Listings
            </a>
        </p>
    </div>
</x-layout>