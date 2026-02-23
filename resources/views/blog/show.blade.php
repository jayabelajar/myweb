@extends('layouts.app')

@section('title', 'Blog Detail')
@if ($post)
    @php
        $postImage = $post->image;
        $postSeoImage = $postImage
            ? (\Illuminate\Support\Str::startsWith($postImage, ['http://', 'https://', '//']) ? $postImage : asset('storage/' . $postImage))
            : asset('favicon.ico');
        $postSeoDescription = trim((string) ($post->excerpt ?: $post->intro));
        if ($postSeoDescription === '') {
            $postSeoDescription = 'Artikel insight dari VeritasDev.';
        }
        $postSeoKeywords = $post->tags->pluck('name')->implode(', ');
    @endphp
    @section('seo_title', $post->title . ' | Blog VeritasDev')
    @section('seo_description', $postSeoDescription)
    @section('seo_canonical', route('blog.show', $post->slug))
    @section('seo_type', 'article')
    @section('seo_image', $postSeoImage)
    @section('seo_keywords', $postSeoKeywords)
    @section('seo_published_time', optional($post->published_at)->toAtomString() ?? '')
    @section('seo_modified_time', optional($post->updated_at)->toAtomString() ?? '')
@else
    @section('seo_title', 'Artikel Tidak Ditemukan | Blog VeritasDev')
    @section('seo_description', 'Artikel yang kamu cari tidak tersedia. Lihat artikel lain di Blog VeritasDev.')
    @section('seo_canonical', route('blog'))
    @section('seo_robots', 'noindex,follow')
@endif

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
                    $imageUrl = null;
                    if ($image) {
                        $imageUrl = \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//'])
                            ? $image
                            : asset('storage/' . $image);
                    }
                @endphp
                @if ($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="w-full h-64 md:h-80 object-cover opacity-90">
                @else
                    <div class="w-full h-64 md:h-80 flex items-center justify-center text-xs uppercase tracking-widest text-zinc-500">
                        No Cover Image
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-8 space-y-10 reveal-up" data-reveal data-reveal-delay="60">
                @php
                    $randomLinks = $posts->shuffle()->take(1);
                    $contentTop = null;
                    $contentBottom = null;
                    if (!empty($post->content)) {
                        $normalizedContent = trim((string) $post->content);
                        $chunks = preg_split('/\n(?=#{1,3}\s)/m', $normalizedContent) ?: [];
                        $chunks = array_values(array_filter(array_map('trim', $chunks), fn ($chunk) => $chunk !== ''));

                        if (count($chunks) < 2) {
                            $chunks = preg_split('/\n{2,}/', $normalizedContent) ?: [];
                            $chunks = array_values(array_filter(array_map('trim', $chunks), fn ($chunk) => $chunk !== ''));
                        }

                        if (count($chunks) >= 2) {
                            $midpoint = (int) ceil(count($chunks) / 2);
                            $contentTop = implode("\n\n", array_slice($chunks, 0, $midpoint));
                            $contentBottom = implode("\n\n", array_slice($chunks, $midpoint));
                        } else {
                            $contentTop = $normalizedContent;
                        }
                    }
                @endphp
                @if (filled($post->intro))
                    <div class="markdown-content markdown-intro text-zinc-300">
                        {!! \Illuminate\Support\Str::markdown($post->intro, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
                    </div>
                @endif
                @if (!empty($post->content))
                    <div class="markdown-content text-zinc-300 leading-relaxed">
                        {!! \Illuminate\Support\Str::markdown($contentTop ?: $post->content, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
                    </div>
                    @if (filled($contentBottom))
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
                        <div class="markdown-content text-zinc-300 leading-relaxed">
                            {!! \Illuminate\Support\Str::markdown($contentBottom, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
                        </div>
                    @endif
                @elseif (!empty($post->sections))
                    @php
                        $sectionMidpoint = (int) ceil(count($post->sections) / 2);
                    @endphp
                    @foreach ($post->sections as $section)
                        <div class="space-y-3">
                            <h2 class="text-2xl font-semibold text-white">{{ $section['title'] }}</h2>
                            <p class="text-zinc-400 leading-relaxed">{{ $section['text'] }}</p>
                        </div>
                        @if ($loop->iteration === $sectionMidpoint)
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
                        @endif
                    @endforeach
                @endif

                @if (empty($post->content) && empty($post->sections))
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
                @endif

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
                                <div class="text-xs text-zinc-500 mb-4">{{ $related->author }} &bull; {{ optional($related->published_at)->format('d M Y') }}</div>
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
                                    <div class="text-xs text-zinc-500 mt-1">{{ optional($popular->published_at)->format('d M Y') }} &bull; {{ $popular->read_time }}</div>
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
@push('styles')
<style>
    .markdown-content > * + * {
        margin-top: 1rem;
    }

    .markdown-content p {
        color: rgb(212 212 216);
        line-height: 1.9;
        margin: 0;
    }

    .markdown-content h1,
    .markdown-content h2,
    .markdown-content h3,
    .markdown-content h4 {
        color: rgb(255 255 255);
        font-weight: 700;
        letter-spacing: -0.01em;
        line-height: 1.25;
    }

    .markdown-content h1 { font-size: 1.9rem; margin-top: 1.75rem; }
    .markdown-content h2 { font-size: 1.55rem; margin-top: 1.5rem; }
    .markdown-content h3 { font-size: 1.3rem; margin-top: 1.25rem; }
    .markdown-content h4 { font-size: 1.1rem; margin-top: 1rem; }

    .markdown-content ul,
    .markdown-content ol {
        margin: 0;
        padding-left: 1.25rem;
        color: rgb(212 212 216);
    }

    .markdown-content li + li {
        margin-top: 0.45rem;
    }

    .markdown-content blockquote {
        margin: 0;
        padding: 0.875rem 1rem;
        border-left: 3px solid rgb(56 189 248 / 0.7);
        background: rgb(255 255 255 / 0.04);
        border-radius: 0.65rem;
        color: rgb(228 228 231);
    }

    .markdown-content code {
        font-size: 0.85em;
        background: rgb(255 255 255 / 0.08);
        border: 1px solid rgb(255 255 255 / 0.08);
        border-radius: 0.375rem;
        padding: 0.1rem 0.35rem;
        color: rgb(224 231 255);
    }

    .markdown-content pre {
        margin: 0;
        background: rgb(9 9 11);
        border: 1px solid rgb(255 255 255 / 0.1);
        border-radius: 0.85rem;
        padding: 0.95rem;
        overflow-x: auto;
    }

    .markdown-content pre code {
        background: transparent;
        border: 0;
        padding: 0;
        color: rgb(228 228 231);
    }

    .markdown-content a {
        color: rgb(56 189 248);
        text-decoration: underline;
        text-decoration-color: rgb(56 189 248 / 0.45);
        text-underline-offset: 3px;
    }

    .markdown-content a:hover {
        color: rgb(125 211 252);
    }

    .markdown-content img {
        width: 100%;
        border-radius: 0.95rem;
        border: 1px solid rgb(255 255 255 / 0.1);
    }

    .markdown-intro p {
        font-size: 1.05rem;
        color: rgb(228 228 231);
    }
</style>
@endpush

@if ($post)
@push('structured_data')
@php
    $blogPostingSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => trim((string) ($post->excerpt ?: $post->intro)),
        'author' => [
            '@type' => 'Person',
            'name' => $post->author ?: 'VeritasDev Team',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'VeritasDev',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('favicon.ico'),
            ],
        ],
        'mainEntityOfPage' => route('blog.show', $post->slug),
        'image' => $postSeoImage,
        'datePublished' => optional($post->published_at)->toAtomString(),
        'dateModified' => optional($post->updated_at)->toAtomString(),
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($blogPostingSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
@endif


