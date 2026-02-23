<div class="w-full max-w-6xl mx-auto mb-24">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 reveal-up" data-reveal>
        <div>
            <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Latest Insight</div>
            <h2 class="text-3xl font-bold text-white tracking-tight">
                Blog <span class="text-zinc-500">Highlights.</span>
            </h2>
            <p class="text-zinc-500 text-sm max-w-md mt-2">
                Ringkasan singkat dari tulisan terbaru kami tentang engineering, product, dan delivery.
            </p>
        </div>
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30 transition-colors">
            Lihat Semua
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14"></path>
                <path d="M13 6l6 6-6 6"></path>
            </svg>
        </a>
    </div>

    @if ($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/15 transition-all reveal-up" data-reveal>
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
                            @if ($post->category)
                                <a href="{{ route('blog.category', $post->category->slug) }}" class="px-2 py-1 border border-white/10 rounded-full hover:border-white/30 hover:text-white transition-colors">
                                    {{ $post->category->name }}
                                </a>
                            @else
                                <span class="px-2 py-1 border border-white/10 rounded-full text-zinc-500">Uncategorized</span>
                            @endif
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
    @else
        <div class="rounded-2xl border border-white/5 bg-zinc-900/30 p-8 text-center text-sm text-zinc-400">
            Belum ada postingan terbaru. Cek lagi nanti.
        </div>
    @endif
</div>
