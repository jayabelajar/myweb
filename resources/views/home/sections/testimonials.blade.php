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
            @forelse ($personTestimonials as $testimonial)
                @php
                    $badge = $testimonial->badge;
                    if (!$badge) {
                        $parts = preg_split('/\s+/', trim($testimonial->name)) ?: [];
                        $badge = strtoupper(substr($parts[0] ?? 'NA', 0, 1) . substr($parts[1] ?? '', 0, 1));
                    }
                    $hasPhoto = filled($testimonial->photo_url ?? null);
                    $photoUrl = null;
                    if ($hasPhoto) {
                        $photo = $testimonial->photo_url;
                        $photoUrl = \Illuminate\Support\Str::startsWith($photo, ['http://', 'https://', '//'])
                            ? $photo
                            : asset('storage/' . $photo);
                    }
                @endphp
                <div class="flex-none w-[80vw] sm:w-[60vw] md:w-[340px] min-w-[260px] sm:min-w-[300px] md:min-w-[340px] p-6 border border-white/5 bg-zinc-900/20 rounded-2xl hover:border-white/10 transition-colors">
                    <div class="text-sky-500 text-4xl font-serif leading-none mb-4">"</div>
                    <p class="text-zinc-300 text-sm leading-relaxed mb-6 italic min-h-[80px]">
                        "{{ $testimonial->quote }}"
                    </p>
                    <div class="flex items-center gap-3">
                        @if ($hasPhoto)
                            <img src="{{ $photoUrl }}" alt="{{ $testimonial->name }}" class="w-8 h-8 rounded-full object-cover border border-white/10">
                        @else
                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-[10px] font-bold text-white">{{ $badge }}</div>
                        @endif
                        <div>
                            <div class="text-white text-xs font-bold">{{ $testimonial->name }}</div>
                            <div class="text-[10px] text-zinc-500">{{ $testimonial->role ?: '-' }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full rounded-2xl border border-white/5 bg-zinc-900/20 p-6 text-sm text-zinc-400">
                    Belum ada testimonial person.
                </div>
            @endforelse
        </div>
    </div>
</div>
