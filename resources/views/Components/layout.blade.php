<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading ?? 'CosMoJobsFinds - Simple Homepage' }}</title>
     
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Define a custom font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
         
        body {
            font-family: 'Inter', sans-serif;
            /* Dark Purple Gradient Background */
            background-image: linear-gradient(135deg, #1d003f 0%, #3e0b5c 50%, #1e1346 100%);
            min-height: 100vh;
        }

        /* Custom glow effect */
        .glow-text {
            text-shadow: 0 0 5px #f0abfc, 0 0 10px #e879f9, 0 0 15px #d946ef;
            transition: all 0.3s ease-in-out;
        }

        /* Interactive hover state for links using the 'nav-link' class */
        .nav-link:hover {
            color: #d8b4fe !important; 
            text-shadow: 0 0 4px #c084fc, 0 0 8px #a855f7;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="text-white antialiased">

    <header class="p-4 sm:p-6 shadow-xl border-b border-purple-700/50">
        {{-- The main container is now a flex container that holds the logo, nav, and button --}}
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
             
            <div class="mb-4 sm:mb-0">
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight glow-text cursor-pointer">
                    CosMoJobFinds
                </h1>
            </div>
            
            {{-- Wrapper for the Navigation and the new Button --}}
            <div class="flex items-center space-x-6 sm:space-x-10">
                <nav>
                    <ul class="flex space-x-6">
                        <li>
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                        </li>
                    </ul>
                </nav>
                
                {{-- NEW "Create Job" BUTTON --}}
                <a href="/jobs/create" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-lg 
                          text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 
                          focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out 
                          transform hover:scale-105"
                >
                    Create 
                </a>
                
            </div>
        </div>
    </header>


    {{-- Interactive Notification --}}
    <div class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md px-4">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="bg-green-600/90 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3">
                <svg class="h-6 w-6 text-green-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <main class="container mx-auto p-6 sm:p-12">
        {{-- Named Slot: Heading (for page titles/banners) --}}
        <section class="text-center py-12 sm:py-24 text-5xl font-black tracking-tighter">
            {{ $heading }}
        </section>

        {{-- Default Slot: Main Content --}}
        {{ $slot }}
    </main>

    <footer class="mt-12 p-4 text-center border-t border-purple-700/50">
        <p class="text-sm text-purple-400">&copy; 2025 CosMoJobsFinds. All rights reserved, somewhere in the cosmos.</p>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</html>