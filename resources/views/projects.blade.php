@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
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
        @foreach ($projects as $project)
            @php
                $image = $project->image;
                $imageUrl = $image
                    ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//']) ? $image : asset('storage/' . $image))
                    : 'https://via.placeholder.com/800x450/111827/9ca3af?text=Project';
            @endphp
            <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/15 transition-all">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10 pointer-events-none"></div>
                    <img src="{{ $imageUrl }}" alt="{{ $project->title }}" class="w-full h-40 object-cover opacity-90">
                </div>
                <div class="p-6">
                    <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-3">{{ $project->category }}</div>
                    <h3 class="text-xl font-bold text-white mb-2">{{ $project->title }}</h3>
                    <p class="text-sm text-zinc-400 mb-6">{{ $project->description }}</p>
                    <a href="{{ $project->link ?? '#' }}" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-sky-400 hover:text-sky-300 mb-6">
                        View Project <span class="text-sm">&rarr;</span>
                    </a>
                    <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                        @foreach ($project->stack ?? [] as $tech)
                            <span class="px-2 py-1 border border-white/10 rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
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
