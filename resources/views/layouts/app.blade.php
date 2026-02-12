<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @if (request()->routeIs('home'))
            VeritasDev | Reliable Software Studio
        @elseif (View::hasSection('title'))
            @yield('title') | VeritasDev
        @else
            VeritasDev
        @endif
    </title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font: Space Grotesk --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-color: #07090c;
            --text-muted: #b3b3b8;
            --border-color: rgba(255, 255, 255, 0.08);
        }
        
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-muted);
            overflow-x: hidden; /* Mencegah horizontal scroll */
            background-image:
                radial-gradient(1200px 600px at 10% -10%, rgba(16, 185, 129, 0.08), transparent 60%),
                radial-gradient(900px 500px at 90% -20%, rgba(59, 130, 246, 0.08), transparent 60%),
                radial-gradient(800px 500px at 50% 120%, rgba(244, 63, 94, 0.06), transparent 60%);
        }

        /* Smooth Anchor Scroll Offset */
        html {
            scroll-padding-top: 100px; /* Agar anchor link tidak tertutup header */
        }

        /* Custom Grid Background */
        .grid-bg {
            background-image:
                linear-gradient(to right, rgba(0,0,0,0.08) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0,0,0,0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(circle at 50% 0%, black 40%, transparent 100%);
            -webkit-mask-image: radial-gradient(circle at 50% 0%, black 40%, transparent 100%);
            opacity: 0.22;
        }

        /* Top Glow Effect */
        .ambient-glow {
            background: radial-gradient(circle at 50% -20%, rgba(16, 185, 129, 0.10), transparent 70%); /* Emerald hint */
            filter: blur(80px);
        }

        /* Floating Chat */
        .float-chat {
            position: fixed;
            right: 20px;
            bottom: 22px;
            z-index: 60;
        }
        .float-chat__btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.14);
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(10px);
            color: #e5e7eb;
            box-shadow: 0 12px 30px rgba(0,0,0,0.35);
            transition: transform .2s ease, border-color .2s ease, background .2s ease;
        }
        .float-chat__btn:hover {
            transform: translateY(-2px);
            border-color: rgba(255,255,255,0.25);
            background: rgba(16,16,16,0.95);
        }
        .float-chat__icon {
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: #25D366;
            display: grid;
            place-items: center;
            color: #0b2513;
        }
        .float-chat__text {
            font-size: 12px;
            font-weight: 600;
            color: #e5e7eb;
        }
        .float-chat__dots {
            display: inline-flex;
            gap: 4px;
            align-items: center;
            margin-left: 6px;
        }
        .float-chat__dot {
            width: 4px;
            height: 4px;
            border-radius: 999px;
            background: #22c55e;
            opacity: .6;
            animation: chat-dot 1.2s infinite ease-in-out;
        }
        .float-chat__dot:nth-child(2) { animation-delay: .2s; }
        .float-chat__dot:nth-child(3) { animation-delay: .4s; }
        @keyframes chat-dot {
            0%, 80%, 100% { opacity: .3; transform: translateY(0); }
            40% { opacity: 1; transform: translateY(-2px); }
        }

        /* Typing Effect */
        .typing-caret::after {
            content: "|";
            display: inline-block;
            margin-left: 2px;
            color: var(--caret-color, #e5e7eb);
            animation: typing-blink 1s step-end infinite;
        }
        @keyframes typing-blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Reveal Animations */
        .reveal-up {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .reveal-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="antialiased selection:bg-white selection:text-black flex flex-col min-h-screen relative">

    {{-- Background Elements --}}
    <div class="fixed inset-0 grid-bg -z-20 pointer-events-none"></div>
    <div class="fixed top-0 left-0 right-0 h-[600px] ambient-glow -z-10 pointer-events-none"></div>

    {{-- HEADER --}}
    <nav class="fixed top-0 w-full z-50 border-b border-white/5 bg-black/70 backdrop-blur-xl supports-[backdrop-filter]:bg-black/50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            
            {{-- 1. Logo Section --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group relative z-50">
                <div class="w-9 h-9 bg-white/5 rounded-lg flex items-center justify-center border border-white/10 group-hover:bg-white group-hover:text-black transition-all duration-500 shadow-[0_0_15px_rgba(255,255,255,0.05)]">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5">
                        <path d="M12 2L2 22h20L12 2z" />
                    </svg>
                </div>
                <span class="text-white font-bold tracking-tight text-lg group-hover:text-zinc-200 transition-colors">
                    VeritasDev
                </span>
            </a>

            {{-- 2. Desktop Navigation (Capsule Style) --}}
            <div class="hidden md:flex items-center gap-1 bg-white/5 rounded-full p-1 border border-white/5 backdrop-blur-md shadow-lg">
                <a href="{{ route('home') }}" @class([
                    'px-5 py-2 text-xs uppercase tracking-widest rounded-full transition-all',
                    'font-semibold text-white bg-white/10 shadow-sm' => request()->routeIs('home'),
                    'font-medium text-zinc-400 hover:text-white hover:bg-white/5' => !request()->routeIs('home'),
                ])>
                    Home
                </a>
                <a href="{{ route('projects') }}" @class([
                    'px-5 py-2 text-xs uppercase tracking-widest rounded-full transition-all',
                    'font-semibold text-white bg-white/10 shadow-sm' => request()->routeIs('projects'),
                    'font-medium text-zinc-400 hover:text-white hover:bg-white/5' => !request()->routeIs('projects'),
                ])>
                    Projects
                </a>
                <a href="{{ route('workflow') }}" @class([
                    'px-5 py-2 text-xs uppercase tracking-widest rounded-full transition-all',
                    'font-semibold text-white bg-white/10 shadow-sm' => request()->routeIs('workflow'),
                    'font-medium text-zinc-400 hover:text-white hover:bg-white/5' => !request()->routeIs('workflow'),
                ])>
                    Workflow
                </a>
                <a href="{{ route('teams') }}" @class([
                    'px-5 py-2 text-xs uppercase tracking-widest rounded-full transition-all',
                    'font-semibold text-white bg-white/10 shadow-sm' => request()->routeIs('teams'),
                    'font-medium text-zinc-400 hover:text-white hover:bg-white/5' => !request()->routeIs('teams'),
                ])>
                    Teams
                </a>
                <a href="{{ route('contact') }}" @class([
                    'px-5 py-2 text-xs uppercase tracking-widest rounded-full transition-all',
                    'font-semibold text-white bg-white/10 shadow-sm' => request()->routeIs('contact'),
                    'font-medium text-zinc-400 hover:text-white hover:bg-white/5' => !request()->routeIs('contact'),
                ])>
                    Contact
                </a>
            </div>

            {{-- 3. Right Actions (CTA & Mobile Toggle) --}}
            <div class="flex items-center gap-3 z-50">
                {{-- CTA Button (Hidden on Mobile) --}}
                <a href="{{ route('contact') }}" class="hidden sm:inline-flex h-9 items-center justify-center gap-2 rounded-full border border-white/20 bg-transparent px-4 text-xs font-semibold text-white transition-all hover:bg-white hover:text-black hover:border-white focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2 focus:ring-offset-zinc-900">
                    <span>Start Project</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3 h-3">
                        <path d="M19 12l-7-7-7 7M19 12H5" transform="rotate(180 12 12)"/> {{-- Arrow down variant --}} 
                         <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-btn" class="md:hidden group flex items-center justify-center w-10 h-10 rounded-full border border-white/10 bg-white/5 text-zinc-300 hover:text-white hover:border-white/20 hover:bg-white/10 transition-all focus:outline-none">
                    <div class="relative w-5 h-5">
                        <span id="icon-menu" class="absolute inset-0 flex items-center justify-center transform transition-all duration-300 opacity-100 scale-100">
                            <span class="block w-5 h-[2px] bg-current rounded-full translate-y-[-4px]"></span>
                            <span class="block w-5 h-[2px] bg-current rounded-full"></span>
                            <span class="block w-5 h-[2px] bg-current rounded-full translate-y-[4px]"></span>
                        </span>
                        <span id="icon-close" class="absolute inset-0 flex items-center justify-center transform transition-all duration-300 opacity-0 scale-75">
                            <span class="block w-5 h-[2px] bg-current rounded-full rotate-45"></span>
                            <span class="block w-5 h-[2px] bg-current rounded-full -rotate-45 -ml-5"></span>
                        </span>
                    </div>
                </button>
            </div>
        </div>

        {{-- MOBILE MENU OVERLAY --}}
        <div id="mobile-menu" class="md:hidden hidden absolute top-[80px] left-0 w-full bg-black/95 backdrop-blur-2xl border-b border-white/10 shadow-2xl transition-all duration-300 origin-top">
            <div class="flex flex-col p-6 space-y-1">
                <a href="{{ route('home') }}" @class([
                    'group flex items-center justify-between py-4 border-b border-white/5 text-sm uppercase tracking-widest transition-colors',
                    'text-white font-semibold' => request()->routeIs('home'),
                    'text-zinc-400 font-medium hover:text-white' => !request()->routeIs('home'),
                ])>
                    <span>Home</span>
                    <span class="text-zinc-600 group-hover:text-emerald-400 transition-colors">&rarr;</span>
                </a>
                <a href="{{ route('projects') }}" @class([
                    'group flex items-center justify-between py-4 border-b border-white/5 text-sm uppercase tracking-widest transition-colors',
                    'text-white font-semibold' => request()->routeIs('projects'),
                    'text-zinc-400 font-medium hover:text-white' => !request()->routeIs('projects'),
                ])>
                    <span>Projects</span>
                    <span class="text-zinc-600 group-hover:text-white transition-colors">&rarr;</span>
                </a>
                <a href="{{ route('workflow') }}" @class([
                    'group flex items-center justify-between py-4 border-b border-white/5 text-sm uppercase tracking-widest transition-colors',
                    'text-white font-semibold' => request()->routeIs('workflow'),
                    'text-zinc-400 font-medium hover:text-white' => !request()->routeIs('workflow'),
                ])>
                    <span>Workflow</span>
                    <span class="text-zinc-600 group-hover:text-white transition-colors">&rarr;</span>
                </a>
                <a href="{{ route('teams') }}" @class([
                    'group flex items-center justify-between py-4 border-b border-white/5 text-sm uppercase tracking-widest transition-colors',
                    'text-white font-semibold' => request()->routeIs('teams'),
                    'text-zinc-400 font-medium hover:text-white' => !request()->routeIs('teams'),
                ])>
                    <span>Teams</span>
                    <span class="text-zinc-600 group-hover:text-white transition-colors">&rarr;</span>
                </a>
                <a href="{{ route('contact') }}" @class([
                    'group flex items-center justify-between py-4 border-b border-white/5 text-sm uppercase tracking-widest transition-colors',
                    'text-white font-semibold' => request()->routeIs('contact'),
                    'text-zinc-400 font-medium hover:text-white' => !request()->routeIs('contact'),
                ])>
                    <span>Contact</span>
                    <span class="text-zinc-600 group-hover:text-white transition-colors">&rarr;</span>
                </a>
                <div class="pt-5">
                    <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center rounded-full bg-white text-black text-xs font-semibold uppercase tracking-widest px-5 py-3 hover:bg-zinc-200 transition-all">
                        Start Project
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    {{-- pt-32 memastikan konten tidak tertutup header yang fixed --}}
    <main class="flex-grow w-full max-w-6xl mx-auto px-6 pt-32 pb-24 relative z-0">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-white/5 bg-[#080808] pt-20 pb-10 mt-auto">
        <div class="max-w-6xl mx-auto px-6">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                {{-- Brand Column --}}
                <div class="md:col-span-5 space-y-6">
                    <div class="flex items-center gap-2 text-white font-bold text-xl tracking-tight">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M12 2L2 22h20L12 2z" />
                        </svg>
                        VeritasDev
                    </div>
                    <p class="text-zinc-500 text-sm leading-relaxed max-w-sm">
                        Studio developer yang fokus pada clean arsitektur, performa tinggi, dan kualitas kode yang konsisten.
                    </p>
                    <div class="flex items-center gap-3 text-zinc-500 text-sm">
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M13 9h3V6h-3c-2.206 0-4 1.794-4 4v2H6v3h3v6h3v-6h3l1-3h-4v-2c0-.552.448-1 1-1z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="GitHub">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12 2C6.477 2 2 6.484 2 12.019c0 4.425 2.865 8.18 6.839 9.504.5.093.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.157-1.108-1.466-1.108-1.466-.907-.62.069-.608.069-.608 1.003.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.833.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.254-.446-1.273.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.748-1.026 2.748-1.026.546 1.377.202 2.396.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.944.359.31.678.92.678 1.855 0 1.339-.012 2.418-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.019C22 6.484 17.523 2 12 2z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M23.954 4.57c-.885.392-1.83.656-2.825.775 1.014-.61 1.794-1.574 2.163-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.206-4.924 4.93 0 .39.045.765.127 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.722-.666 1.562-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.247-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.11-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.053 0 14-7.496 14-13.986 0-.209 0-.42-.016-.63.962-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M20.447 20.452H17.2v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.064V9h3.112v1.561h.045c.434-.823 1.494-1.69 3.074-1.69 3.286 0 3.89 2.164 3.89 4.977v6.604zM5.337 7.433c-1.004 0-1.816-.814-1.816-1.818 0-1.003.812-1.815 1.816-1.815 1.003 0 1.815.812 1.815 1.815 0 1.004-.812 1.818-1.815 1.818zM6.813 20.452H3.86V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center hover:border-white/20 hover:bg-white/10 hover:text-white transition-all" aria-label="WhatsApp">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12.04 2C6.55 2 2.1 6.448 2.1 11.937c0 2.097.552 4.143 1.598 5.952L2 22l4.215-1.664a9.88 9.88 0 0 0 5.825 1.865h.004c5.488 0 9.937-4.448 9.937-9.937S17.528 2 12.04 2zm5.746 14.386c-.243.684-1.404 1.31-1.935 1.385-.503.072-1.133.102-1.828-.116-.42-.133-.959-.31-1.655-.61-2.917-1.262-4.823-4.19-4.971-4.385-.148-.194-1.19-1.58-1.19-3.01 0-1.43.75-2.134 1.016-2.427.266-.292.58-.365.773-.365.194 0 .387.002.557.01.178.01.416-.068.652.498.243.58.83 2.004.903 2.15.073.146.122.316.024.51-.098.194-.146.316-.292.487-.146.171-.308.383-.439.514-.146.146-.298.306-.128.6.17.292.755 1.244 1.622 2.014 1.115.99 2.056 1.297 2.348 1.442.292.146.463.122.633-.073.17-.194.73-.852.924-1.144.194-.292.387-.243.65-.146.266.098 1.68.794 1.967.94.292.146.487.219.558.341.073.122.073.706-.17 1.39z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Spacer --}}
                <div class="hidden md:block md:col-span-1"></div>

                {{-- Sitemap --}}
                <div class="md:col-span-3">
                    <h3 class="text-white font-semibold text-xs uppercase tracking-widest mb-6">Company</h3>
                    <ul class="flex flex-col gap-3 text-sm text-zinc-500">
                        <li><a href="{{ route('projects') }}" class="hover:text-white transition-colors duration-200">Projects</a></li>
                        <li><a href="{{ route('workflow') }}" class="hover:text-white transition-colors duration-200">Workflow</a></li>
                        <li><a href="{{ route('teams') }}" class="hover:text-white transition-colors duration-200">Teams</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors duration-200">Contact</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="md:col-span-3">
                    <h3 class="text-white font-semibold text-xs uppercase tracking-widest mb-6">Contact</h3>
                    <ul class="flex flex-col gap-4 text-sm text-zinc-500">
                        <li class="flex flex-col gap-1">
                            <span class="text-[10px] uppercase tracking-widest text-zinc-600">Email</span>
                            <span class="text-zinc-300">hello@veritasdev.com</span>
                        </li>
                        <li class="flex flex-col gap-1">
                            <span class="text-[10px] uppercase tracking-widest text-zinc-600">Location</span>
                            <span class="text-zinc-300">Sidoarjo, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Footer --}}
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-3 text-xs text-zinc-600 font-medium">
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-x-6 gap-y-2 text-zinc-500">
                    <span>Privacy</span>
                    <span>Terms</span>
                    <span>Careers</span>
                </div>
                <div class="text-center md:text-right">
                    &copy; 2026 VeritasDev Inc. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    {{-- SCRIPT: Mobile Menu Logic --}}
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconMenu = document.getElementById('icon-menu');
        const iconClose = document.getElementById('icon-close');

        btn.addEventListener('click', () => {
            // Toggle Menu Visibility
            menu.classList.toggle('hidden');
            
            // Toggle Icons (Hamburger <-> X)
            if (menu.classList.contains('hidden')) {
                // Menu Closed
                iconMenu.classList.remove('opacity-0', 'scale-75');
                iconMenu.classList.add('opacity-100', 'scale-100');
                
                iconClose.classList.remove('opacity-100', 'scale-100');
                iconClose.classList.add('opacity-0', 'scale-75');
            } else {
                // Menu Open
                iconMenu.classList.remove('opacity-100', 'scale-100');
                iconMenu.classList.add('opacity-0', 'scale-75');
                
                iconClose.classList.remove('opacity-0', 'scale-75');
                iconClose.classList.add('opacity-100', 'scale-100');
            }
        });

        // Close menu when clicking a link (UX Improvement)
        const mobileLinks = menu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Close menu
                menu.classList.add('hidden');
                // Reset icons
                iconMenu.classList.remove('opacity-0', 'scale-75');
                iconMenu.classList.add('opacity-100', 'scale-100');
                iconClose.classList.remove('opacity-100', 'scale-100');
                iconClose.classList.add('opacity-0', 'scale-75');
            });
        });
    </script>


    {{-- SCRIPT: Reveal on Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = Array.from(document.querySelectorAll('[data-reveal]'));
            if (!items.length) return;

            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced) {
                items.forEach(el => el.classList.add('is-visible'));
                return;
            }

            const io = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const el = entry.target;
                    const delay = Number(el.getAttribute('data-reveal-delay')) || 0;
                    setTimeout(() => el.classList.add('is-visible'), delay);
                    io.unobserve(el);
                });
            }, { threshold: 0.25 });

            items.forEach(el => io.observe(el));
        });
    </script>

    {{-- Floating Chat --}}
    <div class="float-chat">
        <a class="float-chat__btn" href="https://wa.me/6285859400250" target="_blank" rel="noopener noreferrer">
            <span class="float-chat__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12.04 2C6.55 2 2.1 6.448 2.1 11.937c0 2.097.552 4.143 1.598 5.952L2 22l4.215-1.664a9.88 9.88 0 0 0 5.825 1.865h.004c5.488 0 9.937-4.448 9.937-9.937S17.528 2 12.04 2zm5.746 14.386c-.243.684-1.404 1.31-1.935 1.385-.503.072-1.133.102-1.828-.116-.42-.133-.959-.31-1.655-.61-2.917-1.262-4.823-4.19-4.971-4.385-.148-.194-1.19-1.58-1.19-3.01 0-1.43.75-2.134 1.016-2.427.266-.292.58-.365.773-.365.194 0 .387.002.557.01.178.01.416-.068.652.498.243.58.83 2.004.903 2.15.073.146.122.316.024.51-.098.194-.146.316-.292.487-.146.171-.308.383-.439.514-.146.146-.298.306-.128.6.17.292.755 1.244 1.622 2.014 1.115.99 2.056 1.297 2.348 1.442.292.146.463.122.633-.073.17-.194.73-.852.924-1.144.194-.292.387-.243.65-.146.266.098 1.68.794 1.967.94.292.146.487.219.558.341.073.122.073.706-.17 1.39z"/></svg>
            </span>
            <span class="float-chat__text">
                Chat on WhatsApp
                <span class="float-chat__dots" aria-hidden="true">
                    <span class="float-chat__dot"></span>
                    <span class="float-chat__dot"></span>
                    <span class="float-chat__dot"></span>
                </span>
            </span>
        </a>
    </div>
</body>
</html>
