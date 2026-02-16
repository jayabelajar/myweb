@extends('layouts.app')

@section('title', 'Reliable Software Studio')

@section('content')
{{-- Custom CSS untuk menyembunyikan scrollbar tapi tetap bisa di-scroll --}}
<style>

    .testi-marquee {
        overflow: hidden;
    }
    .testi-track {
        display: flex;
        gap: 1.5rem;
        width: max-content;
        will-change: transform;
        animation: marquee var(--marquee-duration, 60s) linear infinite;
    }
    .testi-track > div {
        flex: 0 0 auto;
    }
    #testi-marquee:hover .testi-track {
        animation-play-state: paused;
    }
    @keyframes marquee {
        from { transform: translateX(0); }
        to { transform: translateX(var(--marquee-distance, -50%)); }
    }
    @media (prefers-reduced-motion: reduce) {
        .testi-track { animation: none; }
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Stats Animation */
    .stat-card {
        transform: translateY(8px);
        opacity: 0;
        transition: transform .6s ease, opacity .6s ease, background-color .3s ease;
    }
    .stat-card.is-visible {
        transform: translateY(0);
        opacity: 1;
    }
    .stat-number {
        text-shadow: 0 0 18px rgba(255,255,255,0.15);
    }
    .stat-card:hover .stat-number {
        text-shadow: 0 0 28px rgba(59,130,246,0.35);
    }
    @keyframes stat-pop {
        0% { transform: scale(1); }
        40% { transform: scale(1.06); }
        100% { transform: scale(1); }
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

<section class="flex flex-col items-center justify-center">
    
    {{-- ========================================== --}}
    {{-- HERO SECTION --}}
    {{-- ========================================== --}}
    
    {{-- Badge --}}
    <div class="mb-6 px-4 py-1.5 border border-white/10 bg-white/5 rounded-full backdrop-blur-md animate-fade-in-up">
        <span class="text-[11px] font-mono text-zinc-300 tracking-wider uppercase flex items-center gap-2">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
            </span>
            Open for new work
        </span>
    </div>

    {{-- Headline --}}
    <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tighter leading-[1.1] mb-6 text-white text-center max-w-5xl mx-auto reveal-up" data-reveal>
        Build with confidence <br class="hidden md:block" />
        <span class="bg-gradient-to-b from-white via-white to-zinc-600 bg-clip-text text-transparent">
         for long-term impact.
        </span>
    </h1>

    {{-- Subheadline --}}
    <p class="text-lg md:text-xl text-zinc-400 max-w-2xl text-center font-light leading-relaxed mb-8 mx-auto reveal-up" data-reveal data-reveal-delay="80">
        Kami membantu tim membangun produk digital yang rapi, aman, dan terukur dengan fokus pada kualitas, stabilitas, dan performa jangka panjang.
    </p>

    {{-- CTA Buttons --}}
    <div class="flex flex-col sm:flex-row gap-4 mb-16 w-full sm:w-auto justify-center">
        <a href="{{ route('teams') }}"
           class="bg-white text-black px-8 py-3 rounded-full font-semibold text-sm hover:bg-zinc-200 transition-all duration-300 transform hover:scale-105 hover:shadow-[0_0_20px_rgba(255,255,255,0.3)] text-center">
            Meet the Team
        </a>
        <a href="#work"
           class="group bg-transparent text-white border border-white/10 px-8 py-3 rounded-full font-medium text-sm hover:bg-white/5 hover:border-white/20 transition-all duration-300 flex items-center justify-center gap-2">
            Lihat Layanan
            <span class="group-hover:translate-y-0.5 transition-transform">↓</span>
        </a>
    </div>

    {{-- Stats Grid (Jarak dikurangi ke mb-20) --}}
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

    {{-- ========================================== --}}
    {{-- LOGO SECTION --}}
    {{-- ========================================== --}}
    <div class="w-full max-w-6xl mx-auto mb-24 reveal-up" data-reveal>
        <div class="text-center mb-8">
            <p class="text-xs uppercase tracking-widest text-zinc-500">Trusted by teams</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 items-center">
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Orbit</div>
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Northwind</div>
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Solace</div>
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Aurum</div>
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Lumen</div>
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">Vantage</div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- SERVICES SECTION (WEB DEV FOCUS) --}}
    {{-- ========================================== --}}

    <div id="work" class="w-full max-w-6xl mx-auto text-left scroll-mt-28 mb-24">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 reveal-up" data-reveal>
            <div>
                <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Our Services</div>
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Services <span class="text-zinc-500">Overview.</span>
                </h2>
                <p class="text-zinc-500 text-sm max-w-md mt-2">
                    End-to-end delivery yang rapi dan terstruktur, mulai dari discovery, desain, pengembangan, hingga deployment dan perawatan.
                </p>
            </div>
            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30 transition-colors">
                Lihat Semua
                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M13 6l6 6-6 6"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($services as $service)
                <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300 reveal-up" data-reveal>
                    <div class="relative h-24 rounded-xl overflow-hidden border border-white/5 mb-4">
                        <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10"></div>
                        <img src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-90">
                    </div>
                    <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-2">{{ $service->label }}</div>
                    <h3 class="text-lg font-semibold text-white mb-2">{{ $service->title }}</h3>
                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- TESTIMONIALS SLIDER (6 ITEMS) --}}
    {{-- ========================================== --}}
    
    <div class="w-full max-w-6xl mx-auto mb-20 px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8 reveal-up" data-reveal>
            <div>
                <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Client Voices</div>
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Trusted by <span class="text-zinc-500">Visionaries.</span>
                </h2>
                <p class="text-zinc-500 text-sm max-w-md mt-2">
                    Kata mereka yang sudah bekerja bersama kami dan merasakan proses yang transparan, rapi, dan fokus pada hasil.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30 transition-colors">
                Mulai Diskusi
                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M13 6l6 6-6 6"></path>
                </svg>
            </a>
        </div>

        <div id="testi-marquee" class="testi-marquee -mx-6 px-6 md:mx-0 md:px-0 pb-8">
            <div class="testi-track gap-4 md:gap-6">
                {{-- Testi 1 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "VeritasDev mengubah konsep MVP kami menjadi produk skalabel hanya dalam 3 bulan. Code structure-nya sangat rapi."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">AD</div>
                        <div>
                            <div class="text-white text-xs font-bold">Andi Darmawan</div>
                            <div class="text-[10px] text-zinc-500">CTO, FinTech ID</div>
                        </div>
                    </div>
                </div>

                {{-- Testi 2 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "Jarang menemukan studio yang peduli pada performance sedetail ini. Website e-commerce kami load under 1 detik."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">SR</div>
                        <div>
                            <div class="text-white text-xs font-bold">Sarah Rahma</div>
                            <div class="text-[10px] text-zinc-500">Founder, EduFest</div>
                        </div>
                    </div>
                </div>

                {{-- Testi 3 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "Timeline jelas, deliverable sesuai ekspektasi. Partner teknis terbaik untuk startup tahap awal."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">BJ</div>
                        <div>
                            <div class="text-white text-xs font-bold">Budi Jatmiko</div>
                            <div class="text-[10px] text-zinc-500">PM, AgriTech</div>
                        </div>
                    </div>
                </div>

                {{-- Testi 4 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "IoT Dashboard yang mereka buat sangat stabil meskipun menerima ribuan data sensor per detik."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">DK</div>
                        <div>
                            <div class="text-white text-xs font-bold">Dimas K.</div>
                            <div class="text-[10px] text-zinc-500">Ops Manager, SmartFarm</div>
                        </div>
                    </div>
                </div>

                {{-- Testi 5 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "Aplikasi mobile kami berjalan smooth di device low-end sekalipun. Optimasi kodenya luar biasa."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">LN</div>
                        <div>
                            <div class="text-white text-xs font-bold">Lina N.</div>
                            <div class="text-[10px] text-zinc-500">CEO, RetailApp</div>
                        </div>
                    </div>
                </div>

                {{-- Testi 6 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "Support maintenance mereka sangat responsif. Bug fix dilakukan dalam hitungan jam, bukan hari."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">FR</div>
                        <div>
                            <div class="text-white text-xs font-bold">Ferry R.</div>
                            <div class="text-[10px] text-zinc-500">IT Head, CorpMedia</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- BLOG SNIPPET SECTION --}}
    {{-- ========================================== --}}
    <div class="w-full max-w-6xl mx-auto mb-24">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 reveal-up" data-reveal>
            <div>
                <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Latest Insight</div>
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Blog <span class="text-zinc-500">Highlights.</span>
                </h2>
                <p class="text-zinc-500 text-sm max-w-md mt-2">
                    Ringkasan singkat dari tulisan terbaru kami tentang engineering, product, dan delivery.
                </p>
            </div>
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30 transition-colors">
                Lihat Semua
                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M13 6l6 6-6 6"></path>
                </svg>
            </a>
        </div>

        @if ($posts->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/15 transition-all reveal-up" data-reveal>
                        <a href="{{ route('blog.show', $post->slug) }}" class="block">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10 pointer-events-none"></div>
                                @php
                                    $image = $post->image;
                                    $imageUrl = $image
                                        ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//']) ? $image : asset('storage/' . $image))
                                        : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80';
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-44 object-cover opacity-90">
                            </div>
                        </a>
                        <div class="p-6">
                            <div class="flex items-center justify-between text-[10px] uppercase tracking-widest text-zinc-500 mb-4">
                                @if ($post->category)
                                    <a href="{{ route('blog.category', $post->category->slug) }}" class="px-2 py-1 border border-white/10 rounded-full hover:border-white/30 hover:text-white transition-colors">
                                        {{ $post->category->name }}
                                    </a>
                                @else
                                    <span class="px-2 py-1 border border-white/10 rounded-full text-zinc-500">Uncategorized</span>
                                @endif
                                <span>{{ $post->read_time }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="block">
                                <h3 class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-sky-100 transition-colors">{{ $post->title }}</h3>
                                <p class="text-sm text-zinc-400 mb-6">{{ $post->excerpt }}</p>
                            </a>
                            <div class="flex items-center justify-between text-xs text-zinc-500">
                                <span>{{ $post->author }}</span>
                                <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                            </div>
                        </div>
                        <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity">
                            <div class="absolute -top-6 right-8 w-24 h-24 bg-sky-500/10 blur-[60px]"></div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-white/5 bg-zinc-900/30 p-8 text-center text-sm text-zinc-400">
                Belum ada postingan terbaru. Cek lagi nanti.
            </div>
        @endif
    </div>

    {{-- ========================================== --}}
    {{-- CTA SECTION --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-5xl mx-auto px-6 mb-4 reveal-up" data-reveal>
        <div class="relative rounded-[2rem] overflow-hidden border border-white/10 bg-zinc-900/50 px-6 py-16 text-center group">
            
            {{-- Background Glow --}}
            <div class="absolute inset-0 bg-gradient-to-b from-sky-500/5 to-transparent pointer-events-none"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-sky-500/10 blur-[80px] pointer-events-none group-hover:bg-sky-500/20 transition-colors duration-700"></div>

            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 tracking-tight">
                    Siap mulai?
                </h2>
                <p class="text-zinc-400 max-w-lg mx-auto mb-8 text-base font-light">
                    Kami bantu dari strategi hingga delivery dengan proses yang jelas, komunikatif, dan eksekusi yang bisa diandalkan.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="mailto:hello@veritasdev.com" 
                       class="px-8 py-3 bg-white text-black rounded-full font-bold text-sm hover:bg-zinc-200 transition-transform hover:scale-105 shadow-[0_0_20px_rgba(255,255,255,0.2)] w-full sm:w-auto">
                        Start Project
                    </a>
                    <a href="#" 
                       class="px-8 py-3 bg-black border border-zinc-800 text-white rounded-full font-bold text-sm hover:bg-zinc-900 transition-colors w-full sm:w-auto">
                        Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    window.addEventListener('load', () => {
        const marquee = document.getElementById('testi-marquee');
        const track = marquee ? marquee.querySelector('.testi-track') : null;
        if (!track) return;

        const items = Array.from(track.children);
        items.forEach(item => track.appendChild(item.cloneNode(true)));

        const update = () => {
            const halfWidth = track.scrollWidth / 2;
            if (halfWidth <= 0) return;
            track.style.setProperty('--marquee-distance', `-${halfWidth}px`);
            const pxPerSec = 40;
            const duration = Math.max(20, halfWidth / pxPerSec);
            track.style.setProperty('--marquee-duration', `${duration}s`);
        };

        let resizeTimer = null;
        const onResize = () => {
            if (resizeTimer) clearTimeout(resizeTimer);
            resizeTimer = setTimeout(update, 150);
        };

        update();
        window.addEventListener('resize', onResize);
    });
</script>

<script>
    window.addEventListener('load', () => {
        const stats = Array.from(document.querySelectorAll('[data-stat]'));
        if (!stats.length) return;

        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const animateNumber = (el, to, suffix, duration = 1200) => {
            const start = performance.now();
            const from = 0;
            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const value = Math.round(from + (to - from) * (progress * (2 - progress)));
                el.textContent = `${value}${suffix || ''}`;
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.style.animation = 'stat-pop 400ms ease';
                }
            };
            requestAnimationFrame(step);
        };

        const reveal = (card, i) => {
            const numberEl = card.querySelector('[data-count]');
            if (numberEl && !card.dataset.animated) {
                card.dataset.animated = 'true';
                setTimeout(() => {
                    card.classList.add('is-visible');
                    if (prefersReduced) {
                        const to = Number(numberEl.getAttribute('data-count')) || 0;
                        const suffix = numberEl.getAttribute('data-suffix') || '';
                        numberEl.textContent = `${to}${suffix}`;
                    } else {
                        animateNumber(
                            numberEl,
                            Number(numberEl.getAttribute('data-count')) || 0,
                            numberEl.getAttribute('data-suffix') || '',
                            1100
                        );
                    }
                }, i * 120);
            }
        };

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const idx = stats.indexOf(entry.target);
                    reveal(entry.target, idx >= 0 ? idx : 0);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

        stats.forEach((card, i) => {
            if (prefersReduced) {
                reveal(card, i);
            } else {
                io.observe(card);
            }
        });
    });
</script>

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
@endsection
