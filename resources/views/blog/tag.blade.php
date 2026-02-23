@extends('layouts.app')

@section('title', 'Blog Tag')

@section('content')
<section class="flex flex-col items-center justify-center">
    <div class="text-center mb-16 md:mb-20 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
            Tag
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6 reveal-up" data-reveal>
            {{ $tag?->name ?? 'Tag' }} <span class="text-zinc-500">Posts.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed reveal-up" data-reveal data-reveal-delay="80">
            Artikel terkait tag {{ $tag?->name ?? 'ini' }} untuk referensi tim Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-16 reveal-up" data-reveal>
        @forelse ($posts as $post)
            <article class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/15 transition-all">
                <a href="{{ route('blog.show', $post->slug) }}" class="block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10 pointer-events-none"></div>
                        @php
                            $image = $post->image;
                            $imageUrl = null;
                            if ($image) {
                                $imageUrl = \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//'])
                                    ? $image
                                    : asset('storage/' . $image);
                            }
                        @endphp
                        @if ($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-44 object-cover opacity-90">
                        @else
                            <div class="w-full h-44 flex items-center justify-center text-[11px] uppercase tracking-widest text-zinc-500 bg-zinc-900/50 border-b border-white/5">
                                No Image
                            </div>
                        @endif
                    </div>
                </a>
                <div class="p-6">
                    <div class="flex items-center justify-between text-[10px] uppercase tracking-widest text-zinc-500 mb-4">
                        <a href="{{ route('blog.category', $post->category->slug) }}" class="px-2 py-1 border border-white/10 rounded-full hover:border-white/30 hover:text-white transition-colors">
                            {{ $post->category->name }}
                        </a>
                        <span>{{ $post->read_time }}</span>
                    </div>
                    <a href="{{ route('blog.show', $post->slug) }}" class="block">
                        <h3 class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-sky-100 transition-colors">{{ $post->title }}</h3>
                        <p class="text-sm text-zinc-400 mb-6">{{ $post->excerpt }}</p>
                    </a>
                    <div class="flex items-center justify-between text-xs text-zinc-500">
                        <span>{{ $post->author }}</span>
                        <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="absolute -top-6 right-8 w-24 h-24 bg-sky-500/10 blur-[60px]"></div>
                </div>
            </article>
        @empty
            <div class="col-span-full text-center text-zinc-400">Belum ada postingan untuk tag ini.</div>
        @endforelse
    </div>
</section>
@endsection
