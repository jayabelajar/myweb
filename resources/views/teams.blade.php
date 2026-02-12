@extends('layouts.app')

@section('title', 'The Team')

@section('content')
<section class="flex flex-col items-center justify-center">

    {{-- ========================================== --}}
    {{-- HERO SECTION --}}
    {{-- ========================================== --}}
    
    <div class="text-center mb-20 md:mb-32 mt-10 reveal-up" data-reveal>
        {{-- Label --}}
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Our Best Team
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tighter text-white mb-6 reveal-up" data-reveal>
            The <span class="text-zinc-500">Architect.</span>
        </h1>
        
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed reveal-up" data-reveal data-reveal-delay="80">
            Tim berpengalaman yang fokus pada kualitas, keandalan, dan eksekusi dengan perhatian pada detail dan kebutuhan bisnis.
        </p>
    </div>

    {{-- ========================================== --}}
    {{-- TEAM GRID --}}
    {{-- ========================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl mx-auto mb-32 reveal-up" data-reveal>
        
        {{-- Member Card 1 (Lead/Founder) --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            {{-- Image Container --}}
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                {{-- Placeholder Image (Ganti src dengan foto asli) --}}
                <img src="{{ asset('image/jaya.png') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                
                {{-- Overlay Gradient --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                
                {{-- Status Indicator --}}
                <div class="absolute top-4 right-4 px-2 py-1 bg-black/50 backdrop-blur-md rounded border border-white/10 text-[10px] font-mono text-emerald-400 flex items-center gap-1.5">
                    <span class="w-1 h-1 rounded-full bg-emerald-500"></span>
                    Lead
                </div>
            </div>

            {{-- Content --}}
            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="relative z-10">
                <div class="text-xs font-mono text-white mb-1 uppercase tracking-widest">Fullstack Engineer</div>
                <h3 class="text-2xl font-bold text-white mb-3 drop-shadow-[0_0_12px_rgba(16,185,129,0.25)]">Jaya Kusuma</h3>
                <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                    Spesialis pengembangan sistem end-to-end dan scalable.
                </p>
                
                {{-- Social Icons --}}
                <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="https://github.com/jayabelajar" class="text-white/80 hover:text-white transition-colors" aria-label="GitHub">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2C6.477 2 2 6.484 2 12.019c0 4.425 2.865 8.18 6.839 9.504.5.093.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.157-1.108-1.466-1.108-1.466-.907-.62.069-.608.069-.608 1.003.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.833.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.254-.446-1.273.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.748-1.026 2.748-1.026.546 1.377.202 2.396.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.944.359.31.678.92.678 1.855 0 1.339-.012 2.418-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.019C22 6.484 17.523 2 12 2z"/></svg>
                    </a>
                    <a href="https://linkedin.com/in/jykusuma" class="text-white/80 hover:text-white transition-colors" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452H17.2v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.064V9h3.112v1.561h.045c.434-.823 1.494-1.69 3.074-1.69 3.286 0 3.89 2.164 3.89 4.977v6.604zM5.337 7.433c-1.004 0-1.816-.814-1.816-1.818 0-1.003.812-1.815 1.816-1.815 1.003 0 1.815.812 1.815 1.815 0 1.004-.812 1.818-1.815 1.818zM6.813 20.452H3.86V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Twitter">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.954 4.57c-.885.392-1.83.656-2.825.775 1.014-.61 1.794-1.574 2.163-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.206-4.924 4.93 0 .39.045.765.127 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.722-.666 1.562-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.247-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.11-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.053 0 14-7.496 14-13.986 0-.209 0-.42-.016-.63.962-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                    </a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                    </a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Dribbble">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm6.938 6.315a8.454 8.454 0 0 1-3.71 1.04 23.1 23.1 0 0 0-1.29-2.868 8.48 8.48 0 0 1 4.999 1.828zM12 3.5a8.49 8.49 0 0 1 3.784.892 21.507 21.507 0 0 1-4.83 1.296 22.58 22.58 0 0 0-2.324-3.536A8.47 8.47 0 0 1 12 3.5zM7.31 2.74a24.17 24.17 0 0 1 2.53 3.77 31.073 31.073 0 0 1-5.6.074A8.51 8.51 0 0 1 7.31 2.74zM3.5 12a8.53 8.53 0 0 1 .597-3.144 32.52 32.52 0 0 0 6.5-.05 25.6 25.6 0 0 1 1.13 2.53A10.71 10.71 0 0 0 6.02 14.7a8.5 8.5 0 0 1-2.52-2.7zm3.56 3.88a9.19 9.19 0 0 1 5.09-2.58 20.29 20.29 0 0 1 1.36 5.21A8.51 8.51 0 0 1 7.06 15.88zM14.74 18.77a21.97 21.97 0 0 0-1.26-4.86 18.19 18.19 0 0 1 4.39.72A8.52 8.52 0 0 1 14.74 18.77zM18.65 13.06a19.66 19.66 0 0 0-5.67-.83c-.05-.12-.1-.25-.16-.37a24.893 24.893 0 0 0 1.46-3.2 10.02 10.02 0 0 0 4.64-1.21A8.51 8.51 0 0 1 18.65 13.06z"/></svg>
                    </a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Medium">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M4.315 5.243a1.2 1.2 0 0 0-.347-.992L2.62 2.68V2.5h4.195l3.245 7.1 2.856-7.1h4.007v.18l-1.152 1.104a.34.34 0 0 0-.129.326v8.111a.34.34 0 0 0 .129.326l1.126 1.104v.18h-5.667v-.18l1.166-1.132c.114-.113.114-.147.114-.326V6.621l-3.24 7.59h-.438L5.06 6.621v5.865c-.03.227.045.457.203.62l1.515 1.817v.18H2.5v-.18l1.515-1.817a.74.74 0 0 0 .188-.62z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        </div>

        {{-- Member Card 2 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="https://media.licdn.com/dms/image/v2/D4E35AQEaeITUCNcAGA/profile-framedphoto-shrink_800_800/B4EZo4xppbJ0Ag-/0/1761889131428?e=1771459200&v=beta&t=v8sh6007l63MqZaADI1NFemeF5Ue8jRrA92Sr2UUZWk" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="relative z-10">
                    <div class="text-xs font-mono text-white mb-1 uppercase tracking-widest">UI/UX Designer</div>
                    <h3 class="text-2xl font-bold text-white mb-3 drop-shadow-[0_0_12px_rgba(16,185,129,0.25)]">Argeswara</h3>
                    <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                        Merancang pengalaman digital yang intuitif dan aksesibel.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="GitHub">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2C6.477 2 2 6.484 2 12.019c0 4.425 2.865 8.18 6.839 9.504.5.093.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.157-1.108-1.466-1.108-1.466-.907-.62.069-.608.069-.608 1.003.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.833.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.254-.446-1.273.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.748-1.026 2.748-1.026.546 1.377.202 2.396.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.944.359.31.678.92.678 1.855 0 1.339-.012 2.418-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.019C22 6.484 17.523 2 12 2z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452H17.2v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.064V9h3.112v1.561h.045c.434-.823 1.494-1.69 3.074-1.69 3.286 0 3.89 2.164 3.89 4.977v6.604zM5.337 7.433c-1.004 0-1.816-.814-1.816-1.818 0-1.003.812-1.815 1.816-1.815 1.003 0 1.815.812 1.815 1.815 0 1.004-.812 1.818-1.815 1.818zM6.813 20.452H3.86V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.954 4.57c-.885.392-1.83.656-2.825.775 1.014-.61 1.794-1.574 2.163-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.206-4.924 4.93 0 .39.045.765.127 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.722-.666 1.562-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.247-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.11-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.053 0 14-7.496 14-13.986 0-.209 0-.42-.016-.63.962-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Dribbble">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm6.938 6.315a8.454 8.454 0 0 1-3.71 1.04 23.1 23.1 0 0 0-1.29-2.868 8.48 8.48 0 0 1 4.999 1.828zM12 3.5a8.49 8.49 0 0 1 3.784.892 21.507 21.507 0 0 1-4.83 1.296 22.58 22.58 0 0 0-2.324-3.536A8.47 8.47 0 0 1 12 3.5zM7.31 2.74a24.17 24.17 0 0 1 2.53 3.77 31.073 31.073 0 0 1-5.6.074A8.51 8.51 0 0 1 7.31 2.74zM3.5 12a8.53 8.53 0 0 1 .597-3.144 32.52 32.52 0 0 0 6.5-.05 25.6 25.6 0 0 1 1.13 2.53A10.71 10.71 0 0 0 6.02 14.7a8.5 8.5 0 0 1-2.52-2.7zm3.56 3.88a9.19 9.19 0 0 1 5.09-2.58 20.29 20.29 0 0 1 1.36 5.21A8.51 8.51 0 0 1 7.06 15.88zM14.74 18.77a21.97 21.97 0 0 0-1.26-4.86 18.19 18.19 0 0 1 4.39.72A8.52 8.52 0 0 1 14.74 18.77zM18.65 13.06a19.66 19.66 0 0 0-5.67-.83c-.05-.12-.1-.25-.16-.37a24.893 24.893 0 0 0 1.46-3.2 10.02 10.02 0 0 0 4.64-1.21A8.51 8.51 0 0 1 18.65 13.06z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Medium">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M4.315 5.243a1.2 1.2 0 0 0-.347-.992L2.62 2.68V2.5h4.195l3.245 7.1 2.856-7.1h4.007v.18l-1.152 1.104a.34.34 0 0 0-.129.326v8.111a.34.34 0 0 0 .129.326l1.126 1.104v.18h-5.667v-.18l1.166-1.132c.114-.113.114-.147.114-.326V6.621l-3.24 7.59h-.438L5.06 6.621v5.865c-.03.227.045.457.203.62l1.515 1.817v.18H2.5v-.18l1.515-1.817a.74.74 0 0 0 .188-.62z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Member Card 3 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('image/arges.jpg') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="relative z-10">
                    <div class="text-xs font-mono text-white mb-1 uppercase tracking-widest">DevOps Engineer</div>
                    <h3 class="text-2xl font-bold text-white mb-3 drop-shadow-[0_0_12px_rgba(16,185,129,0.25)]">Hasan Basri</h3>
                    <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                        Menjaga infrastruktur cloud stabil dengan CI/CD.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="GitHub">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2C6.477 2 2 6.484 2 12.019c0 4.425 2.865 8.18 6.839 9.504.5.093.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.157-1.108-1.466-1.108-1.466-.907-.62.069-.608.069-.608 1.003.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.833.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.254-.446-1.273.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.748-1.026 2.748-1.026.546 1.377.202 2.396.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.944.359.31.678.92.678 1.855 0 1.339-.012 2.418-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.019C22 6.484 17.523 2 12 2z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452H17.2v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.064V9h3.112v1.561h.045c.434-.823 1.494-1.69 3.074-1.69 3.286 0 3.89 2.164 3.89 4.977v6.604zM5.337 7.433c-1.004 0-1.816-.814-1.816-1.818 0-1.003.812-1.815 1.816-1.815 1.003 0 1.815.812 1.815 1.815 0 1.004-.812 1.818-1.815 1.818zM6.813 20.452H3.86V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.954 4.57c-.885.392-1.83.656-2.825.775 1.014-.61 1.794-1.574 2.163-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.206-4.924 4.93 0 .39.045.765.127 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.722-.666 1.562-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.247-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.11-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.053 0 14-7.496 14-13.986 0-.209 0-.42-.016-.63.962-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Dribbble">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm6.938 6.315a8.454 8.454 0 0 1-3.71 1.04 23.1 23.1 0 0 0-1.29-2.868 8.48 8.48 0 0 1 4.999 1.828zM12 3.5a8.49 8.49 0 0 1 3.784.892 21.507 21.507 0 0 1-4.83 1.296 22.58 22.58 0 0 0-2.324-3.536A8.47 8.47 0 0 1 12 3.5zM7.31 2.74a24.17 24.17 0 0 1 2.53 3.77 31.073 31.073 0 0 1-5.6.074A8.51 8.51 0 0 1 7.31 2.74zM3.5 12a8.53 8.53 0 0 1 .597-3.144 32.52 32.52 0 0 0 6.5-.05 25.6 25.6 0 0 1 1.13 2.53A10.71 10.71 0 0 0 6.02 14.7a8.5 8.5 0 0 1-2.52-2.7zm3.56 3.88a9.19 9.19 0 0 1 5.09-2.58 20.29 20.29 0 0 1 1.36 5.21A8.51 8.51 0 0 1 7.06 15.88zM14.74 18.77a21.97 21.97 0 0 0-1.26-4.86 18.19 18.19 0 0 1 4.39.72A8.52 8.52 0 0 1 14.74 18.77zM18.65 13.06a19.66 19.66 0 0 0-5.67-.83c-.05-.12-.1-.25-.16-.37a24.893 24.893 0 0 0 1.46-3.2 10.02 10.02 0 0 0 4.64-1.21A8.51 8.51 0 0 1 18.65 13.06z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Medium">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M4.315 5.243a1.2 1.2 0 0 0-.347-.992L2.62 2.68V2.5h4.195l3.245 7.1 2.856-7.1h4.007v.18l-1.152 1.104a.34.34 0 0 0-.129.326v8.111a.34.34 0 0 0 .129.326l1.126 1.104v.18h-5.667v-.18l1.166-1.132c.114-.113.114-.147.114-.326V6.621l-3.24 7.59h-.438L5.06 6.621v5.865c-.03.227.045.457.203.62l1.515 1.817v.18H2.5v-.18l1.515-1.817a.74.74 0 0 0 .188-.62z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Member Card 4 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('image/alan.jpg') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="relative z-10">
                    <div class="text-xs font-mono text-white mb-1 uppercase tracking-widest">Product Manager</div>
                    <h3 class="text-2xl font-bold text-white mb-3 drop-shadow-[0_0_12px_rgba(16,185,129,0.25)]">Ahmad Alan</h3>
                    <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                        Menjembatani visi bisnis dan eksekusi dengan roadmap jelas.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="GitHub">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2C6.477 2 2 6.484 2 12.019c0 4.425 2.865 8.18 6.839 9.504.5.093.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.157-1.108-1.466-1.108-1.466-.907-.62.069-.608.069-.608 1.003.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.833.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.254-.446-1.273.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.748-1.026 2.748-1.026.546 1.377.202 2.396.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.944.359.31.678.92.678 1.855 0 1.339-.012 2.418-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.019C22 6.484 17.523 2 12 2z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452H17.2v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.064V9h3.112v1.561h.045c.434-.823 1.494-1.69 3.074-1.69 3.286 0 3.89 2.164 3.89 4.977v6.604zM5.337 7.433c-1.004 0-1.816-.814-1.816-1.818 0-1.003.812-1.815 1.816-1.815 1.003 0 1.815.812 1.815 1.815 0 1.004-.812 1.818-1.815 1.818zM6.813 20.452H3.86V9h2.953v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.727v20.545C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.273V1.727C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.954 4.57c-.885.392-1.83.656-2.825.775 1.014-.61 1.794-1.574 2.163-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.206-4.924 4.93 0 .39.045.765.127 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.722-.666 1.562-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.247-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.11-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.053 0 14-7.496 14-13.986 0-.209 0-.42-.016-.63.962-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Dribbble">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm6.938 6.315a8.454 8.454 0 0 1-3.71 1.04 23.1 23.1 0 0 0-1.29-2.868 8.48 8.48 0 0 1 4.999 1.828zM12 3.5a8.49 8.49 0 0 1 3.784.892 21.507 21.507 0 0 1-4.83 1.296 22.58 22.58 0 0 0-2.324-3.536A8.47 8.47 0 0 1 12 3.5zM7.31 2.74a24.17 24.17 0 0 1 2.53 3.77 31.073 31.073 0 0 1-5.6.074A8.51 8.51 0 0 1 7.31 2.74zM3.5 12a8.53 8.53 0 0 1 .597-3.144 32.52 32.52 0 0 0 6.5-.05 25.6 25.6 0 0 1 1.13 2.53A10.71 10.71 0 0 0 6.02 14.7a8.5 8.5 0 0 1-2.52-2.7zm3.56 3.88a9.19 9.19 0 0 1 5.09-2.58 20.29 20.29 0 0 1 1.36 5.21A8.51 8.51 0 0 1 7.06 15.88zM14.74 18.77a21.97 21.97 0 0 0-1.26-4.86 18.19 18.19 0 0 1 4.39.72A8.52 8.52 0 0 1 14.74 18.77zM18.65 13.06a19.66 19.66 0 0 0-5.67-.83c-.05-.12-.1-.25-.16-.37a24.893 24.893 0 0 0 1.46-3.2 10.02 10.02 0 0 0 4.64-1.21A8.51 8.51 0 0 1 18.65 13.06z"/></svg>
                        </a>
                        <a href="#" class="text-white/80 hover:text-white transition-colors" aria-label="Medium">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M4.315 5.243a1.2 1.2 0 0 0-.347-.992L2.62 2.68V2.5h4.195l3.245 7.1 2.856-7.1h4.007v.18l-1.152 1.104a.34.34 0 0 0-.129.326v8.111a.34.34 0 0 0 .129.326l1.126 1.104v.18h-5.667v-.18l1.166-1.132c.114-.113.114-.147.114-.326V6.621l-3.24 7.59h-.438L5.06 6.621v5.865c-.03.227.045.457.203.62l1.515 1.817v.18H2.5v-.18l1.515-1.817a.74.74 0 0 0 .188-.620z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- CULTURE / VALUES SECTION --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-6xl mx-auto mb-20 px-6 reveal-up" data-reveal>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-white mb-6">Our DNA.</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">01</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Quality over Quantity</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Kami lebih memilih merilis satu fitur sempurna daripada sepuluh fitur yang setengah matang.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">02</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Always Learning</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Teknologi berubah setiap detik. Kami beradaptasi dan belajar lebih cepat dari perubahan itu sendiri.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">03</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Ego-less Code</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Kode terbaik adalah hasil kolaborasi, bukan arogansi. Kami terbuka terhadap kritik dan perbaikan.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Visual / Quote --}}
            <div class="h-full min-h-[300px] rounded-2xl border border-white/5 bg-zinc-900/30 p-8 flex flex-col justify-between relative overflow-hidden group">
                 <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 blur-[80px] pointer-events-none group-hover:bg-emerald-500/20 transition-colors duration-700"></div>
                 
                 <div class="text-6xl text-white/5 font-serif">"</div>
                 <blockquote class="text-xl md:text-2xl text-zinc-300 font-light leading-relaxed relative z-10">
                    "Great software is built by great teams, not just great individuals. We invest in people first."
                 </blockquote>
                 <div class="text-sm font-mono text-emerald-400 mt-6 relative z-10">— VeritasDev</div>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- JOIN US CTA --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-5xl mx-auto px-6 mt-16 mb-20 reveal-up" data-reveal>
        <div class="relative rounded-[2rem] overflow-hidden border border-white/10 bg-zinc-900/50 px-6 py-14 text-center group">
            <div class="absolute inset-0 bg-gradient-to-b from-emerald-500/5 to-transparent pointer-events-none"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-emerald-500/10 blur-[80px] pointer-events-none group-hover:bg-emerald-500/20 transition-colors duration-700"></div>

            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-white mb-4">Are you one of us?</h2>
                <p class="text-zinc-400 text-sm mb-8">
                    Kami selalu mencari talenta berbakat yang memiliki passion di bidang Engineering dan Design.
                </p>
                <a href="mailto:careers@veritasdev.com" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
                    Apply Now <span class="text-lg leading-none">&rarr;</span>
                </a>
            </div>
        </div>
    </div>

</section>
@endsection

