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
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center">
            
            <div class="mb-4 sm:mb-0">
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight glow-text cursor-pointer">
                    CosMoJobFinds
                </h1>
            </div>

            <nav>
    <ul class="flex space-x-6 sm:space-x-10">
        <li>
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        </li>
        <li>
            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
        </li>
    </ul>
</nav>
        </div>
    </header>

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
</html>