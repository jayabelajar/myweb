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
            @php
                $image = $service->image;
                $imageUrl = null;
                if ($image) {
                    if (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//'])) {
                        $imageUrl = $image;
                    } elseif (\Illuminate\Support\Str::startsWith($image, ['/'])) {
                        $imageUrl = asset(ltrim($image, '/'));
                    } else {
                        $imageUrl = asset('storage/' . $image);
                    }
                }
            @endphp
            <div class="group relative p-6 bg-zinc-900/30 border border-white/5 rounded-2xl hover:border-white/20 hover:bg-zinc-900/60 transition-all duration-300 reveal-up" data-reveal>
                <div class="relative h-24 rounded-xl overflow-hidden border border-white/5 mb-4">
                    <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10"></div>
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-90">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[11px] uppercase tracking-widest text-zinc-500 bg-zinc-900/40">
                            {{ $service->label }}
                        </div>
                    @endif
                </div>
                <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-2">{{ $service->label }}</div>
                <h3 class="text-lg font-semibold text-white mb-2">{{ $service->title }}</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">{{ $service->description }}</p>
            </div>
        @endforeach
    </div>
</div>
