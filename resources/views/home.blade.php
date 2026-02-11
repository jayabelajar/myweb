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
        text-shadow: 0 0 28px rgba(16,185,129,0.35);
    }
    @keyframes stat-pop {
        0% { transform: scale(1); }
        40% { transform: scale(1.06); }
        100% { transform: scale(1); }
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
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            Open for new work
        </span>
    </div>

    {{-- Headline --}}
    <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tighter leading-[1.1] mb-6 text-white text-center max-w-5xl mx-auto">
        <span data-typing="Build with confidence " data-typing-start="100"></span><br class="hidden md:block" />
        <span class="bg-gradient-to-b from-white via-white to-zinc-600 bg-clip-text text-transparent" data-typing="for long-term impact." data-typing-delay="500" style="--caret-color:#ffffff;">
        </span>
    </h1>

    {{-- Subheadline --}}
    <p class="text-lg md:text-xl text-zinc-400 max-w-2xl text-center font-light leading-relaxed mb-8 mx-auto">
        <span data-typing="Kami membantu tim membangun produk digital yang rapi, aman, dan terukur dengan fokus pada kualitas, stabilitas, dan performa jangka panjang." data-typing-delay="600"></span>
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
    {{-- SERVICES SECTION (6 ITEMS) --}}
    {{-- ========================================== --}}

    <div id="work" class="w-full max-w-6xl mx-auto text-left scroll-mt-28 mb-24">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-white tracking-tight mb-2">
                Services <span class="text-zinc-500">Overview.</span>
            </h2>
            <p class="text-zinc-500 text-sm max-w-sm mx-auto">
                End-to-end delivery yang rapi dan terstruktur, mulai dari discovery, desain, pengembangan, hingga deployment dan perawatan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            {{-- 1. Product Design --}}
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">UI/UX Design</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Riset pengguna, wireframing, dan desain antarmuka yang intuitif dan estetik.</p>
            </div>

            {{-- 2. Mobile Applications --}}
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Mobile Apps</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Pengembangan aplikasi iOS & Android performa tinggi (Native & Cross-platform).</p>
            </div>

            {{-- 3. Web Engineering --}}
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Web Development</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Sistem web kompleks, SaaS, dan e-commerce dengan backend scalable.</p>
            </div>

            {{-- 4. IoT Solutions --}}
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">IoT Solutions</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Integrasi hardware dan software untuk smart home, industri, dan monitoring sistem.</p>
            </div>

             {{-- 5. Digital Marketing --}}
             <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Digital Marketing</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">SEO, Google Ads, dan strategi pertumbuhan digital untuk meningkatkan konversi.</p>
            </div>

            {{-- 6. Maintenance --}}
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-4 text-white group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Maintenance</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Server monitoring, bug fixing, dan update berkala agar sistem tetap aman.</p>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- TESTIMONIALS SLIDER (6 ITEMS) --}}
    {{-- ========================================== --}}
    
    <div class="w-full max-w-6xl mx-auto mb-20 px-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white tracking-tight mb-2">
                Trusted by <span class="text-zinc-500">Visionaries.</span>
            </h2>
            <p class="text-zinc-500 text-sm max-w-sm mx-auto">
                Kata mereka yang sudah bekerja bersama kami dan merasakan proses yang transparan, rapi, dan fokus pada hasil.
            </p>
        </div>

        <div id="testi-marquee" class="testi-marquee -mx-6 px-6 md:mx-0 md:px-0 pb-8">
            <div class="testi-track gap-4 md:gap-6">
                {{-- Testi 1 --}}
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
                    <div class="text-emerald-500 text-4xl font-serif leading-none mb-4">"</div>
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
    {{-- CTA SECTION --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-5xl mx-auto px-6 mb-4">
        <div class="relative rounded-[2rem] overflow-hidden border border-white/10 bg-zinc-900/50 px-6 py-16 text-center group">
            
            {{-- Background Glow --}}
            <div class="absolute inset-0 bg-gradient-to-b from-emerald-500/5 to-transparent pointer-events-none"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-emerald-500/10 blur-[80px] pointer-events-none group-hover:bg-emerald-500/20 transition-colors duration-700"></div>

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
@endsection
