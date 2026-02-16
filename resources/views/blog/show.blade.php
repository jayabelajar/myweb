@extends('layouts.app')

@section('title', 'Blog Detail')

@section('content')
@if (!$post)
    <section class="flex flex-col items-center justify-center text-center">
        <div class="max-w-2xl mx-auto reveal-up" data-reveal>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                Blog Not Found
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Postingan tidak ditemukan</h1>
            <p class="text-zinc-400 mb-8">Silakan kembali ke daftar blog untuk melihat postingan lainnya.</p>
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
                Kembali ke Blog <span class="text-lg leading-none">&rarr;</span>
            </a>
        </div>
    </section>
@else
    <section class="flex flex-col">
        <div class="max-w-5xl reveal-up" data-reveal>
            <nav class="text-xs uppercase tracking-widest text-zinc-500 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span class="mx-2 text-zinc-700">/</span>
                <a href="{{ route('blog') }}" class="hover:text-white transition-colors">Blog</a>
                <span class="mx-2 text-zinc-700">/</span>
                <a href="{{ route('blog.category', $post->category->slug) }}" class="hover:text-white transition-colors">{{ $post->category->name }}</a>
                <span class="mx-2 text-zinc-700">/</span>
                <span class="text-zinc-400">{{ $post->title }}</span>
            </nav>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                <a href="{{ route('blog.category', $post->category->slug) }}" class="hover:text-white transition-colors">{{ $post->category->name }}</a>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold tracking-tighter text-white mb-6">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center gap-6 text-xs text-zinc-500 uppercase tracking-widest mb-10">
                <span class="inline-flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21a8 8 0 1 0-16 0" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    {{ $post->author }}
                </span>
                <span class="inline-flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 7v5l3 3" />
                    </svg>
                    {{ optional($post->published_at)->format('d M Y') }}
                </span>
                <span class="inline-flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 5h16" />
                        <path d="M8 5l1 14h6l1-14" />
                        <path d="M6 9h12" />
                    </svg>
                    {{ $post->read_time }}
                </span>
            </div>
        </div>

        <div class="max-w-5xl mb-12 reveal-up" data-reveal data-reveal-delay="40">
            <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-zinc-900/40">
                <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10 pointer-events-none"></div>
                @php
                    $image = $post->image;
                    $imageUrl = $image
                        ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//']) ? $image : asset('storage/' . $image))
                        : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80';
                @endphp
                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-64 md:h-80 object-cover opacity-90">
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-8 space-y-10 reveal-up" data-reveal data-reveal-delay="60">
                <p class="text-lg text-zinc-300 leading-relaxed">{{ $post->intro }}</p>
                @if (!empty($post->content))
                    <div class="markdown-content text-zinc-300 leading-relaxed">
                        {!! \Illuminate\Support\Str::markdown($post->content) !!}
                    </div>
                @elseif (!empty($post->sections))
                    @foreach ($post->sections as $section)
                        <div class="space-y-3">
                            <h2 class="text-2xl font-semibold text-white">{{ $section['title'] }}</h2>
                            <p class="text-zinc-400 leading-relaxed">{{ $section['text'] }}</p>
                        </div>
                    @endforeach
                @endif

                @php
                    $randomLinks = $posts->shuffle()->take(1);
                @endphp
                <div class="rounded-2xl border border-white/10 bg-zinc-900/40 p-5">
                    <div class="text-[10px] uppercase tracking-widest text-sky-400 mb-3">Baca Juga</div>
                    <div class="space-y-3">
                        @foreach ($randomLinks as $random)
                            <a href="{{ route('blog.show', $random->slug) }}" class="group flex items-center justify-between text-sm text-zinc-300 hover:text-white transition-colors">
                                <span class="font-medium">{{ $random->title }}</span>
                                <span class="text-zinc-600 group-hover:text-sky-400 transition-colors">&rarr;</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="pt-8">
                    <h3 class="text-sm uppercase tracking-widest text-white mb-6">Related Posts</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($posts->take(2) as $related)
                            <article class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl p-5 hover:border-white/15 transition-all">
                                <div class="flex items-center justify-between text-[10px] uppercase tracking-widest text-zinc-500 mb-4">
                                    <span class="px-2 py-1 border border-white/10 rounded-full">{{ $related->category->name }}</span>
                                    <span>{{ $related->read_time }}</span>
                                </div>
                                <h4 class="text-lg font-bold text-white mb-2 leading-snug">{{ $related->title }}</h4>
                                <div class="text-xs text-zinc-500 mb-4">{{ $related->author }} • {{ optional($related->published_at)->format('d M Y') }}</div>
                                <a href="{{ route('blog.show', $related->slug) }}" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-sky-400 hover:text-sky-300">
                                    Baca Detail <span class="text-sm">&rarr;</span>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <aside class="lg:col-span-4 space-y-6 reveal-up" data-reveal data-reveal-delay="80">
                <div class="rounded-2xl border border-white/10 bg-zinc-900/40 p-6">
                    <h3 class="text-sm uppercase tracking-widest text-white mb-5">Popular Posts</h3>
                    <div class="space-y-4">
                        @foreach ($posts->take(8) as $popular)
                            <a href="{{ route('blog.show', $popular->slug) }}" class="group flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl border border-white/10 bg-white/5 flex items-center justify-center text-xs font-semibold text-sky-400">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-white group-hover:text-sky-300 transition-colors">{{ $popular->title }}</div>
                                    <div class="text-xs text-zinc-500 mt-1">{{ optional($popular->published_at)->format('d M Y') }} • {{ $popular->read_time }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-2xl border border-white/10 bg-zinc-900/40 p-6">
                    <h3 class="text-sm uppercase tracking-widest text-white mb-4">Tags Populer</h3>
                    <div class="flex flex-wrap gap-2 text-[10px] uppercase tracking-widest text-zinc-500">
                        @foreach ($topTags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" class="px-3 py-1 border border-white/10 rounded-full hover:border-white/30 hover:text-white transition-colors">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endif
@endsection
