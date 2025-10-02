<x-layout>
    {{-- Named Slot for the Heading --}}
    <x-slot:heading>
        <h2 class="text-5xl sm:text-6xl font-black mb-4 tracking-tighter">
            Contact Us
        </h2>
        <p class="text-xl text-purple-300 max-w-3xl mx-auto mb-8">
            Send us a transmission, and we'll get back to you as soon as possible.
        </p>
    </x-slot:heading>

    {{-- Default Slot for the Main Content --}}
    <div class="bg-white/5 p-8 rounded-xl max-w-md mx-auto">
        <form class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-purple-300">Email Address</label>
                <input type="email" id="email" class="mt-1 block w-full rounded-md shadow-sm p-3 bg-white/10 border border-purple-500/50 text-white focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-purple-300">Message</label>
                <textarea id="message" rows="4" class="mt-1 block w-full rounded-md shadow-sm p-3 bg-white/10 border border-purple-500/50 text-white focus:ring-purple-500 focus:border-purple-500"></textarea>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-lg font-semibold bg-purple-600 hover:bg-purple-700 rounded-lg shadow-lg transition duration-300">
                Send Transmission
            </button>
        </form>
    </div>
</x-layout>