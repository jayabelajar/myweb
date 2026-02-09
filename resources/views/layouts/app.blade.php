<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Argeswara' }}</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000;
            background-image: radial-gradient(circle at 50% -20%, #111, #000);
        }
        .grid-bg {
            background-image: linear-gradient(to right, #111 1px, transparent 1px),
                              linear-gradient(to bottom, #111 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .blur-glow {
            filter: blur(100px);
            background: linear-gradient(90deg, #0070f3, #f81ae5);
            opacity: 0.15;
        }
    </style>
</head>

<body class="text-zinc-400 antialiased selection:bg-white selection:text-black">

    <div class="fixed inset-0 grid-bg -z-10"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-lg h-64 blur-glow -z-10"></div>

    <nav class="fixed top-0 w-full z-50 border-b border-white/5 bg-black/50 backdrop-blur-xl">
        <div class="max-w-5xl mx-auto px-6 h-14 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <svg viewBox="0 0 76 65" fill="none" class="h-4 w-auto text-white">
                    <path d="M37.5273 0L75.0546 65H0L37.5273 0Z" fill="currentColor"/>
                </svg>
                <span class="text-white font-semibold tracking-tight text-sm uppercase">Argeswara</span>
            </div>

            <div class="flex gap-6 text-[11px] font-medium uppercase tracking-wider">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <a href="{{ route('biodata') }}" class="hover:text-white transition">Profile</a>
                <a href="{{ route('pendidikan') }}" class="hover:text-white transition">Education</a>
                <a href="{{ route('prestasi') }}" class="hover:text-white transition">Awards</a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6">
        @yield('content')
    </main>

    <footer class="py-20 border-t border-white/5 text-center">

        <div class="flex justify-center gap-6 mb-8 text-[11px] text-zinc-500">
            <a href="#" class="hover:text-white transition underline decoration-zinc-800">GitHub</a>
            <a href="#" class="hover:text-white transition underline decoration-zinc-800">LinkedIn</a>
            <a href="#" class="hover:text-white transition underline decoration-zinc-800">Twitter</a>
        </div>
        <p class="text-[12px] text-zinc-700 font-medium">
            &copy; {{ date('Y') }} Argeswara. All rights reserved.
        </p>
    </footer>

</body>
</html>
