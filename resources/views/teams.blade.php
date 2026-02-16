@extends('layouts.app')

@section('title', 'The Team')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-20 md:mb-32 mt-10 reveal-up" data-reveal>
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl mx-auto mb-32 reveal-up" data-reveal>
        @forelse ($teams as $team)
            <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
                <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                    <img src="{{ $team->photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($team->name) . '&background=111827&color=fff' }}" 
                         alt="{{ $team->name }}" 
                         class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                </div>

                <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="relative z-10">
                        <div class="text-xs font-mono text-white mb-1 uppercase tracking-widest">{{ $team->role }}</div>
                        <h3 class="text-2xl font-bold text-white mb-3 drop-shadow-[0_0_12px_rgba(16,185,129,0.25)]">{{ $team->name }}</h3>
                        <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                            {{ $team->bio }}
                        </p>
                        @if (!empty($team->socials))
                            <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                @foreach ($team->socials as $key => $url)
                                    <a href="{{ $url }}" class="text-white/80 hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                                        {{ strtoupper($key) }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-zinc-500">Belum ada anggota tim.</div>
        @endforelse
    </div>

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

</section>
@endsection
