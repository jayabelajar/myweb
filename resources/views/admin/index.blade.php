@extends('admin.layouts.app')

@section('content')
<div class="mb-8 sm:mb-10">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
        Admin Panel
    </div>
    <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-white mb-2">Control Center</h1>
    <p class="text-sm text-zinc-500">Kelola konten dan section halaman dari satu tempat.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 mb-8">
    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Total Posts</div>
        <div class="text-3xl font-bold text-white">{{ $totalPosts }}</div>
    </div>
    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Draft</div>
        <div class="text-3xl font-bold text-white">{{ $drafts }}</div>
    </div>
    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <div class="text-xs uppercase tracking-widest text-zinc-500 mb-2">Messages</div>
        <div class="text-3xl font-bold text-white">0</div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm uppercase tracking-widest text-white">Recent Posts</h2>
            <a href="{{ route('admin.blog.create') }}" class="text-xs uppercase tracking-widest text-sky-400 hover:text-sky-300">New Post</a>
        </div>
        <div class="space-y-4">
            @forelse ($posts as $post)
                <div class="flex items-center justify-between gap-4 border-b border-white/5 pb-4 last:border-b-0 last:pb-0">
                    <div class="min-w-0">
                        <div class="text-white font-semibold truncate">{{ $post->title }}</div>
                        <div class="text-xs text-zinc-500">
                            {{ $post->published_at ? 'Published' : 'Draft' }} • {{ $post->published_at ? $post->published_at->format('d M Y') : '—' }}
                        </div>
                    </div>
                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Edit</a>
                </div>
            @empty
                <div class="text-sm text-zinc-500">Belum ada postingan.</div>
            @endforelse
        </div>
    </div>

    <div class="bg-zinc-900/20 border border-white/5 rounded-2xl p-5 sm:p-6">
        <h2 class="text-sm uppercase tracking-widest text-white mb-4">Page Controls</h2>
        <div class="space-y-3">
            <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between border border-white/5 rounded-xl px-4 py-3 hover:border-white/10 transition-colors">
                <span class="text-sm text-zinc-300">Projects</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Manage</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between border border-white/5 rounded-xl px-4 py-3 hover:border-white/10 transition-colors">
                <span class="text-sm text-zinc-300">Services</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Manage</span>
            </a>
            <a href="{{ route('admin.teams.index') }}" class="flex items-center justify-between border border-white/5 rounded-xl px-4 py-3 hover:border-white/10 transition-colors">
                <span class="text-sm text-zinc-300">Teams</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Manage</span>
            </a>
            <a href="{{ route('admin.blog.index') }}" class="flex items-center justify-between border border-white/5 rounded-xl px-4 py-3 hover:border-white/10 transition-colors">
                <span class="text-sm text-zinc-300">Blog</span>
                <span class="text-xs uppercase tracking-widest text-sky-400">Manage</span>
            </a>
        </div>
    </div>
</div>
@endsection
