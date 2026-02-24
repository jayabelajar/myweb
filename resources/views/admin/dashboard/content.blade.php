@php
    $userName = auth()->user()?->name ?? 'Admin';
@endphp

<section class="mb-8 sm:mb-10">
    <p class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Dashboard</p>
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white">Halo, {{ $userName }}</h1>
    <p class="text-sm text-zinc-500 mt-2">Ringkasan konten website hari ini.</p>
</section>

<section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5 mb-8">
    <article class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest text-zinc-500">Blog Posts</p>
        <p class="text-3xl font-bold text-white mt-3">{{ $totalPosts }}</p>
    </article>
    <article class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest text-zinc-500">Projects</p>
        <p class="text-3xl font-bold text-white mt-3">{{ $totalProjects }}</p>
    </article>
    <article class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest text-zinc-500">Services</p>
        <p class="text-3xl font-bold text-white mt-3">{{ $totalServices }}</p>
    </article>
    <article class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5">
        <p class="text-xs uppercase tracking-widest text-zinc-500">Testimonials</p>
        <p class="text-3xl font-bold text-white mt-3">{{ $totalTestimonials }}</p>
    </article>
</section>

<section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <div class="xl:col-span-2 bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm uppercase tracking-widest text-white">History</h2>
            <a href="{{ route('admin.blog.index') }}" class="text-xs uppercase tracking-widest text-sky-400 hover:text-sky-300">View All</a>
        </div>

        <div class="space-y-3">
            @forelse ($posts as $post)
                <div class="flex items-center justify-between gap-3 rounded-xl border border-white/5 px-4 py-3">
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ $post->title }}</p>
                        <p class="text-xs text-zinc-500 mt-1">
                            {{ $post->published_at ? 'Published' : 'Draft' }}
                            |
                            {{ ($post->published_at ?? $post->updated_at)?->format('d M Y H:i') }}
                        </p>
                    </div>
                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Edit</a>
                </div>
            @empty
                <p class="text-sm text-zinc-500">Belum ada riwayat konten.</p>
            @endforelse
        </div>
    </div>

    <aside class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <h2 class="text-sm uppercase tracking-widest text-white mb-4">Aksi Cepat</h2>
        <div class="space-y-3">
            <a href="{{ route('admin.blog.index') }}" class="flex items-center justify-between rounded-xl border border-white/5 px-4 py-3 hover:border-white/15 transition-colors">
                <span class="text-sm text-zinc-200">Kelola Blog Post</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Go</span>
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between rounded-xl border border-white/5 px-4 py-3 hover:border-white/15 transition-colors">
                <span class="text-sm text-zinc-200">Kelola Project</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Go</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between rounded-xl border border-white/5 px-4 py-3 hover:border-white/15 transition-colors">
                <span class="text-sm text-zinc-200">Kelola Service</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Go</span>
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="flex items-center justify-between rounded-xl border border-white/5 px-4 py-3 hover:border-white/15 transition-colors">
                <span class="text-sm text-zinc-200">Kelola Testimonial</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Go</span>
            </a>
        </div>
    </aside>
</section>
