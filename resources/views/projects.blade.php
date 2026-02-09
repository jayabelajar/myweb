@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Selected Projects
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6">
            Selected <span class="text-zinc-500">Projects.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed">
            Portofolio proyek yang fokus pada stabilitas, performa, dan hasil bisnis dibangun dengan proses yang rapi dan fokus pada kualitas.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-24">
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
    </div>

    <div class="w-full max-w-4xl mx-auto text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Proyek baru?</h2>
        <p class="text-zinc-400 text-sm mb-6">Ceritakan tujuan bisnis Anda. Kami bantu dari strategi hingga delivery dengan proses yang terstruktur dan komunikasi yang jelas.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
            Start Project <span class="text-lg leading-none">&rarr;</span>
        </a>
    </div>

</section>
@endsection
