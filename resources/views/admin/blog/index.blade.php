@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Blog Posts</h1>
        <p class="text-sm text-zinc-500">Kelola konten blog yang tampil di publik.</p>
    </div>
    
    <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
        <form action="{{ route('admin.blog.index') }}" method="GET" class="relative w-full sm:w-64">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau kategori..." class="w-full rounded-full border border-white/10 bg-zinc-900/50 px-4 py-2 text-sm text-white placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-sky-400/60">
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-white transition-colors">
                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M20 20l-3.5-3.5"></path>
                </svg>
            </button>
        </form>

        <a href="{{ route('admin.blog.create') }}" data-drawer-url="{{ route('admin.blog.create', ['drawer' => 1]) }}" data-drawer-title="New Post" class="inline-flex w-full sm:w-auto items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30 whitespace-nowrap">
            New Post
        </a>
    </div>
</div>

<x-admin.table :headers="[
    ['label' => 'Title'],
    ['label' => 'Category'],
    ['label' => 'Status'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($posts as $post)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $post->title }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $post->category?->name ?? '-' }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $post->published_at ? 'Published' : 'Draft' }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.blog.edit', $post)"
                    :edit-drawer-url="route('admin.blog.edit', [$post, 'drawer' => 1])"
                    edit-title="Edit Post"
                    :delete-url="route('admin.blog.destroy', $post)"
                    confirm="Hapus post ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-4 py-8 text-center text-zinc-500">Belum ada post atau tidak ada yang cocok dengan pencarian.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
