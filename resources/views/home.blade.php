<x-layout>

    <x-slot:heading>
        <div class="flex flex-col items-center justify-center text-center">
            <h2 class="text-5xl sm:text-6xl font-black mb-4 tracking-tighter min-h-[3.5rem]" x-data="{ text: '', full: 'Your Next Cosmic Opportunity Awaits', i: 0 }" x-init="let interval = setInterval(() => { if (i < full.length) { text += full[i++]; } else { clearInterval(interval); } }, 50)" x-text="text"></h2>
            <p class="text-xl text-purple-500 max-w-3xl mx-auto mb-8">
                Discover the most interesting roles across the digital universe. Start your journey with CosMoJobsFinds today.
            </p>
        </div>
    </x-slot:heading>

     <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
    <div class="bg-white/5 backdrop-blur-sm p-6 rounded-xl border border-purple-500/30 text-center transition duration-300 hover:scale-[1.02] hover:bg-white/10">
            <span class="text-5xl mb-4 inline-block glow-text">🚀</span>
            <h3 class="text-xl font-bold mb-2">Curated Listings</h3>
            <p class="text-purple-300 text-sm">Hand-picked roles from top employers across the galaxy.</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm p-6 rounded-xl border border-purple-500/30 text-center transition duration-300 hover:scale-[1.02] hover:bg-white/10">
            <span class="text-5xl mb-4 inline-block glow-text">✨</span>
            <h3 class="text-xl font-bold mb-2">Real-time Updates</h3>
            <p class="text-purple-300 text-sm">Never miss a stellar job posting with our live feed.</p>
        </div>
        <div class="bg-white/5 backdrop-blur-sm p-6 rounded-xl border border-purple-500/30 text-center transition duration-300 hover:scale-[1.02] hover:bg-white/10">
            <span class="text-5xl mb-4 inline-block glow-text">🔭</span>
            <h3 class="text-xl font-bold mb-2">Career Tools</h3>
            <p class="text-purple-300 text-sm">Resources to help you navigate your professional trajectory.</p>
        </div>
    </div>
</x-layout>