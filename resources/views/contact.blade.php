<x-layout>
    <x-slot:heading>
        <div class="text-4xl sm:text-5xl font-extrabold tracking-tighter text-center glow-text">
            Contact Us
        </div>
    </x-slot:heading>
    <div class="max-w-2xl mx-auto p-8 bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl border border-purple-500/50 mt-8">
        <h2 class="text-2xl font-bold text-white mb-4">We'd love to hear from you!</h2>
        <p class="text-purple-200 mb-4">
            For questions, feedback, or support, please reach out using the form below or email us at <a href="mailto:support@cosmojobfinds.com" class="underline text-purple-300 hover:text-purple-100">support@cosmojobfinds.com</a>.
        </p>
        <form class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-purple-300">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-purple-300">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150" required>
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-purple-300">Message</label>
                <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-lg border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-purple-500/50 focus:ring-2 focus:ring-inset focus:ring-purple-400 sm:text-sm bg-purple-100/90 transition duration-150" required></textarea>
            </div>
            <button type="submit" class="inline-flex justify-center rounded-lg bg-purple-600 px-5 py-2 text-sm font-semibold text-white shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out transform hover:scale-[1.02]">Send Message</button>
        </form>
    </div>
</x-layout>
