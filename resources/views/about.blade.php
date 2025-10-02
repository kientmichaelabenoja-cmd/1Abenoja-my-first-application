<x-layout>
    {{-- Named Slot for the Heading --}}
    <x-slot:heading>
        <h2 class="text-5xl sm:text-6xl font-black mb-4 tracking-tighter">
            About CosMoJobsFinds
        </h2>
        <p class="text-xl text-purple-300 max-w-3xl mx-auto mb-8">
            We are dedicated to bridging the gap between stellar talent and cosmic opportunities.
        </p>
    </x-slot:heading>

    {{-- Default Slot for the Main Content --}}
    <div class="bg-white/5 p-8 rounded-xl max-w-4xl mx-auto">
        <p class="text-lg mb-4">Founded by three intergalactic travelers, CosMoJobsFinds has quickly become the premier job board for remote roles across all sectors.</p>
        <p class="text-lg">Our mission is to help you find your professional home, no matter what quadrant of the universe you're in.</p>
    </div>
</x-layout>