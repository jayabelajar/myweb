<div>
    <div class="w-full flex justify-center">
        <div class="inline-flex mb-6 px-4 py-1.5 border border-white/10 bg-white/5 rounded-full backdrop-blur-md animate-fade-in-up">
            <span class="text-[11px] font-mono text-zinc-300 tracking-wider uppercase flex items-center gap-2">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                </span>
                Open for new work
            </span>
        </div>
    </div>

    <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tighter leading-[1.1] mb-6 text-white text-center max-w-5xl mx-auto reveal-up" data-reveal>
        Build with confidence <br class="hidden md:block" />
        <span class="bg-gradient-to-b from-white via-white to-zinc-600 bg-clip-text text-transparent">
            for long-term impact.
        </span>
    </h1>

    <p class="text-lg md:text-xl text-zinc-400 max-w-2xl text-center font-light leading-relaxed mb-8 mx-auto reveal-up" data-reveal data-reveal-delay="80">
        Kami membantu tim membangun produk digital yang rapi, aman, dan terukur dengan fokus pada kualitas, stabilitas, dan performa jangka panjang.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 mb-16 w-full sm:w-auto justify-center">
        <a href="{{ route('teams') }}"
           class="bg-white text-black px-8 py-3 rounded-full font-semibold text-sm hover:bg-zinc-200 transition-all duration-300 transform hover:scale-105 hover:shadow-[0_0_20px_rgba(255,255,255,0.3)] text-center">
            Meet the Team
        </a>
        <a href="#work"
           class="group bg-transparent text-white border border-white/10 px-8 py-3 rounded-full font-medium text-sm hover:bg-white/5 hover:border-white/20 transition-all duration-300 flex items-center justify-center gap-2">
            Lihat Layanan
            <span class="group-hover:translate-y-0.5 transition-transform">&darr;</span>
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-px bg-white/10 border border-white/10 rounded-2xl overflow-hidden max-w-4xl w-full mb-20 mx-auto shadow-2xl shadow-black/50">
        <div class="stat-card bg-black/80 backdrop-blur-sm p-6 md:p-8 flex flex-col items-center justify-center hover:bg-black/60 transition-colors" data-stat>
            <div class="stat-number text-3xl md:text-4xl font-bold text-white mb-1" data-count="12" data-suffix="+">0</div>
            <div class="text-[10px] md:text-xs text-zinc-500 uppercase tracking-widest font-mono">Completed Projects</div>
        </div>
        <div class="stat-card bg-black/80 backdrop-blur-sm p-6 md:p-8 flex flex-col items-center justify-center hover:bg-black/60 transition-colors border-l border-white/5 md:border-l-0" data-stat>
            <div class="stat-number text-3xl md:text-4xl font-bold text-white mb-1" data-count="99" data-suffix="%">0</div>
            <div class="text-[10px] md:text-xs text-zinc-500 uppercase tracking-widest font-mono">Uptime Reliability</div>
        </div>
        <div class="stat-card bg-black/80 backdrop-blur-sm p-6 md:p-8 col-span-2 md:col-span-1 flex flex-col items-center justify-center hover:bg-black/60 transition-colors border-t border-white/5 md:border-t-0 md:border-l" data-stat>
            <div class="stat-number text-3xl md:text-4xl font-bold text-white mb-1" data-count="24" data-suffix="/7">0</div>
            <div class="text-[10px] md:text-xs text-zinc-500 uppercase tracking-widest font-mono">Engineering Support</div>
        </div>
    </div>
</div>
