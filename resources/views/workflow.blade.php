@extends('layouts.app')

@section('title', 'Workflow')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Workflow
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6">
            <span data-typing="Workflow " data-typing-start="100"></span><span class="text-zinc-500" data-typing="Overview." data-typing-delay="500"></span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed">
            <span data-typing="Proses yang transparan dan terukur agar hasil konsisten, timeline jelas, dan kualitas tetap terjaga di setiap tahap." data-typing-delay="600"></span>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-6xl mx-auto mb-24">
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">01. Discovery</div>
            <h3 class="text-xl font-bold text-white mb-2">Scope & Strategy</h3>
            <p class="text-sm text-zinc-400">Selaraskan tujuan bisnis, kebutuhan pengguna, dan KPI sejak awal.</p>
        </div>
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">02. Design</div>
            <h3 class="text-xl font-bold text-white mb-2">UX Architecture</h3>
            <p class="text-sm text-zinc-400">Desain alur, prototipe, dan validasi secara terstruktur.</p>
        </div>
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">03. Build</div>
            <h3 class="text-xl font-bold text-white mb-2">Engineering Sprint</h3>
            <p class="text-sm text-zinc-400">Pengembangan modular dengan QA berlapis dan review rutin.</p>
        </div>
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">04. Launch</div>
            <h3 class="text-xl font-bold text-white mb-2">Go Live</h3>
            <p class="text-sm text-zinc-400">Go-live aman, monitoring, dan handover rapi.</p>
        </div>
    </div>

    <div class="w-full max-w-4xl mx-auto text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Estimasi timeline?</h2>
        <p class="text-zinc-400 text-sm mb-6">Kami siapkan roadmap berdasarkan scope dan resource yang jelas, disesuaikan dengan target bisnis Anda.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
            Request Roadmap <span class="text-lg leading-none">&rarr;</span>
        </a>
    </div>

</section>
@endsection
