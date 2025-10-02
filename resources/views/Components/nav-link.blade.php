@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 
        'text-white glow-text border-b-2 border-purple-400' : 
        'nav-link text-purple-200' 
    }} text-lg font-medium transition duration-300">
    
    {{ $slot }}
</a>