@extends('layouts.app')

@section('title', 'Blog')
@section('seo_title', 'Blog VeritasDev | Insight Engineering, Product, dan Delivery')
@section('seo_description', 'Kumpulan artikel VeritasDev tentang software engineering, arsitektur sistem, performa aplikasi, dan delivery produk digital.')
@section('seo_canonical', route('blog'))
@section('seo_keywords', 'blog software engineering, artikel web development, laravel tips, product engineering')

@section('content')
<section class="flex flex-col items-center justify-center">
    <div class="text-center mb-16 md:mb-20 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
            Studio Insights
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6 reveal-up" data-reveal>
            Blog <span class="text-zinc-500">VeritasDev.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed reveal-up" data-reveal data-reveal-delay="80">
            Catatan engineering, design, dan product yang fokus pada sistem yang rapi, performa terukur, dan delivery yang konsisten.
        </p>
    </div>

    <div class="w-full max-w-3xl mx-auto mb-12 reveal-up" data-reveal data-reveal-delay="120">
        <div class="relative">
            <input type="text" placeholder="Cari artikel, topik, atau kata kunci..." class="w-full rounded-full border border-white/10 bg-zinc-900/50 px-6 py-4 text-sm text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-sky-400/60">
            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-zinc-500">
                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M20 20l-3.5-3.5"></path>
                </svg>
            </span>
        </div>
    </div>

    <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-10 reveal-up" data-reveal>
        @foreach ($posts as $post)
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
        @endforeach
    </div>

    <div class="flex justify-center mb-16 reveal-up" data-reveal>
        <button id="blog-load" type="button" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
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
        const grid = document.getElementById('blog-grid');
        const btn = document.getElementById('blog-load');
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

@push('structured_data')
@php
    $blogSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Blog',
        'name' => 'Blog VeritasDev',
        'description' => 'Insight engineering, product, dan delivery dari tim VeritasDev.',
        'url' => route('blog'),
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'VeritasDev',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('favicon.ico'),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($blogSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
