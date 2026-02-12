@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Selected Projects
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6 reveal-up" data-reveal>
            Selected <span class="text-zinc-500">Projects.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed reveal-up" data-reveal data-reveal-delay="80">
            Portofolio proyek yang fokus pada stabilitas, performa, dan hasil bisnis dibangun dengan proses yang rapi dan fokus pada kualitas.
        </p>
    </div>

    <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-10 reveal-up" data-reveal>
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">SaaS Platform</div>
            <h3 class="text-xl font-bold text-white mb-2">RevenueOS</h3>
            <p class="text-sm text-zinc-400 mb-6">CRM + billing engine untuk tim sales enterprise.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Laravel</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Postgres</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Stripe</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">E-Commerce</div>
            <h3 class="text-xl font-bold text-white mb-2">UrbanMart</h3>
            <p class="text-sm text-zinc-400 mb-6">Marketplace fashion dengan inventory realtime.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Next.js</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Redis</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Elastic</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Fintech</div>
            <h3 class="text-xl font-bold text-white mb-2">Payglow</h3>
            <p class="text-sm text-zinc-400 mb-6">Wallet & payout system untuk merchant.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Go</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Kafka</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Vault</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">HealthTech</div>
            <h3 class="text-xl font-bold text-white mb-2">CareSync</h3>
            <p class="text-sm text-zinc-400 mb-6">Platform telemedis dengan jadwal dokter.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Vue</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Node</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Twilio</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">IoT</div>
            <h3 class="text-xl font-bold text-white mb-2">AgriPulse</h3>
            <p class="text-sm text-zinc-400 mb-6">Dashboard sensor tanah & irigasi otomatis.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">MQTT</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Grafana</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Timescale</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Education</div>
            <h3 class="text-xl font-bold text-white mb-2">SkillForge</h3>
            <p class="text-sm text-zinc-400 mb-6">LMS modular untuk bootcamp skala besar.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Laravel</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">S3</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Video CDN</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Analytics</div>
            <h3 class="text-xl font-bold text-white mb-2">PulseIQ</h3>
            <p class="text-sm text-zinc-400 mb-6">Dashboard analytics real-time untuk growth team.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">React</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">ClickHouse</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Kafka</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Logistics</div>
            <h3 class="text-xl font-bold text-white mb-2">RouteX</h3>
            <p class="text-sm text-zinc-400 mb-6">Optimasi rute pengiriman dan tracking armada.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Laravel</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">PostGIS</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Redis</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Healthcare</div>
            <h3 class="text-xl font-bold text-white mb-2">MediLoop</h3>
            <p class="text-sm text-zinc-400 mb-6">Manajemen klinik dengan antrian pintar.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Vue</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">MySQL</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Queue</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Fintech</div>
            <h3 class="text-xl font-bold text-white mb-2">CardSpring</h3>
            <p class="text-sm text-zinc-400 mb-6">Virtual card issuance untuk expense management.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Go</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">gRPC</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Postgres</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Media</div>
            <h3 class="text-xl font-bold text-white mb-2">StreamHive</h3>
            <p class="text-sm text-zinc-400 mb-6">Platform streaming internal dengan CDN privat.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Next.js</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">S3</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">Video CDN</span>
            </div>
        </div>

        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-6 hover:border-white/15 transition-all">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Security</div>
            <h3 class="text-xl font-bold text-white mb-2">ShieldOps</h3>
            <p class="text-sm text-zinc-400 mb-6">Monitoring keamanan aplikasi dan audit akses.</p>
            <a href="#" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-emerald-400 hover:text-emerald-300 mb-6">
                View Project <span class="text-sm">&rarr;</span>
            </a>
            <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                <span class="px-2 py-1 border border-white/10 rounded-full">Node</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">WAF</span>
                <span class="px-2 py-1 border border-white/10 rounded-full">SIEM</span>
            </div>
        </div>
    </div>

    <div class="flex justify-center mb-24 reveal-up" data-reveal>
        <button id="projects-load" type="button" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
            Load More
            <svg viewBox="0 0 24 24" class="w-4 h-4 animate-spin" fill="none">
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" opacity="0.25"></circle>
                <path d="M21 12a9 9 0 0 1-9 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
        </button>
    </div>

    <div class="w-full max-w-5xl mx-auto px-6 mt-16 mb-10 reveal-up" data-reveal>
        <div class="relative rounded-[2rem] overflow-hidden border border-white/10 bg-zinc-900/50 px-6 py-14 text-center group">
            <div class="absolute inset-0 bg-gradient-to-b from-emerald-500/5 to-transparent pointer-events-none"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-emerald-500/10 blur-[80px] pointer-events-none group-hover:bg-emerald-500/20 transition-colors duration-700"></div>

            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Proyek baru?</h2>
                <p class="text-zinc-400 text-sm mb-6">Ceritakan tujuan bisnis Anda. Kami bantu dari strategi hingga delivery dengan proses yang terstruktur dan komunikasi yang jelas.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
                    Start Project <span class="text-lg leading-none">&rarr;</span>
                </a>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const grid = document.getElementById('projects-grid');
        const btn = document.getElementById('projects-load');
        if (!grid || !btn) return;

        const cards = Array.from(grid.children);
        const pageSize = 6;
        let visible = pageSize;

        const update = () => {
            cards.forEach((card, i) => {
                card.style.display = i < visible ? '' : 'none';
            });
            if (visible >= cards.length) {
                btn.classList.add('hidden');
            }
        };

        update();

        btn.addEventListener('click', () => {
            visible = Math.min(visible + pageSize, cards.length);
            update();
        });
    });
</script>
@endsection
