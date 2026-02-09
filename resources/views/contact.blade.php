@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Contact
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6">
            Contact <span class="text-zinc-500">Us.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed">
            Ceritakan kebutuhan Anda. Kami siapkan scope dan estimasi awal yang jelas, beserta rekomendasi langkah berikutnya.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-16">
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Email</div>
            <div class="text-white font-semibold">hello@veritasdev.com</div>
            <p class="text-sm text-zinc-400 mt-2">Untuk proposal dan kolaborasi.</p>
        </div>
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Location</div>
            <div class="text-white font-semibold">Jakarta, Indonesia</div>
            <p class="text-sm text-zinc-400 mt-2">Remote-first, siap global.</p>
        </div>
        <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
            <div class="text-xs font-mono text-emerald-400 uppercase tracking-widest mb-3">Availability</div>
            <div class="text-white font-semibold">Mon–Fri, 09.00–18.00</div>
            <p class="text-sm text-zinc-400 mt-2">WIB / GMT+7</p>
        </div>
    </div>

    <div class="w-full max-w-3xl mx-auto bg-zinc-900/30 border border-white/5 rounded-2xl p-6 md:p-8 mb-10">
        <h2 class="text-xl font-bold text-white mb-6">Project Inquiry</h2>
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" placeholder="Name" class="w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/40" />
            <input type="email" placeholder="Email" class="w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/40" />
            <input type="text" placeholder="Company" class="w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/40" />
            <input type="text" placeholder="Budget Range" class="w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/40" />
            <textarea placeholder="Project summary" rows="5" class="md:col-span-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/40"></textarea>
            <button type="button" class="md:col-span-2 mt-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
                Submit
            </button>
        </form>
    </div>

</section>
@endsection
