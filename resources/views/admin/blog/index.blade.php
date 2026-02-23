@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Blog Posts</h1>
        <p class="text-sm text-zinc-500">Kelola konten blog yang tampil di publik.</p>
    </div>
    <a href="{{ route('admin.blog.create') }}" data-drawer-url="{{ route('admin.blog.create', ['drawer' => 1]) }}" data-drawer-title="New Post" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Post
    </a>
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
            <td colspan="4" class="px-4 py-8 text-center text-zinc-500">Belum ada post.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
