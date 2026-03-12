@extends('layouts.app')

@section('title', $title)

@section('content')
<section class="max-w-5xl mx-auto py-16 px-6 md:px-8">
    <div class="mb-12 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full border border-white/10 bg-white/5 text-[11px] font-mono tracking-widest uppercase mb-8">
            <a href="{{ route('projects') }}" class="text-zinc-400 hover:text-white transition-colors">Projects</a>
            <span class="text-zinc-600">/</span>
            <span class="text-sky-400">{{ $project->category }}</span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6">
            {{ $project->title }}
        </h1>
        
        <p class="text-xl text-zinc-400 font-light leading-relaxed max-w-3xl">
            {{ $project->description }}
        </p>

        @if($project->link)
            <div class="mt-10">
                <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
                    Visit Project
                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        <polyline points="15 3 21 3 21 9"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                </a>
            </div>
        @endif
    </div>

    @php
        $image = $project->image;
        $imageUrl = $image 
            ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//']) ? $image : asset('storage/' . $image))
            : 'https://via.placeholder.com/1200x600/111827/9ca3af?text=' . urlencode($project->title);
    @endphp

    <div class="w-full rounded-[2rem] overflow-hidden border border-white/10 bg-zinc-900/50 reveal-up mb-16 relative group" data-reveal data-reveal-delay="100">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <img src="{{ $imageUrl }}" alt="{{ $project->title }}" class="w-full h-auto object-cover aspect-video opacity-90 group-hover:scale-105 transition-transform duration-700">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 reveal-up" data-reveal>
        <div class="lg:col-span-2 prose prose-invert prose-zinc max-w-none prose-p:text-zinc-400 prose-p:leading-relaxed prose-headings:text-white">
            <h2 class="text-3xl font-bold tracking-tight mb-6">About the Project</h2>
            <p>
                {{ $project->description }}
            </p>
            @if($project->content)
                {!! Str::markdown($project->content) !!}
            @endif
        </div>

        <div>
            <div class="bg-zinc-900/30 border border-white/5 rounded-3xl p-8 sticky top-8">
                <h3 class="text-xs font-bold text-white uppercase tracking-widest mb-6 flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg>
                    Technologies Used
                </h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($project->stack ?? [] as $tech)
                        <span class="px-4 py-2 border border-white/10 rounded-xl text-xs text-zinc-300 bg-white/5 hover:bg-white/10 transition-colors">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
                
                @if($project->link)
                <div class="mt-8 pt-8 border-t border-white/5">
                    <h3 class="text-xs font-bold text-white uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                        Visit Project
                    </h3>
                    <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="text-sm text-sky-400 hover:text-sky-300 hover:underline break-all transition-colors flex items-center gap-2">
                        {{ $project->link }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
