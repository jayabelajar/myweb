@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Blog Tags</h1>
        <p class="text-sm text-zinc-500">Kelola tag blog.</p>
    </div>
    <a href="{{ route('admin.blog.tags.create') }}" data-drawer-url="{{ route('admin.blog.tags.create', ['drawer' => 1]) }}" data-drawer-title="New Tag" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Tag
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Name'],
    ['label' => 'Slug'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($tags as $tag)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $tag->name }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $tag->slug }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.blog.tags.edit', $tag)"
                    :edit-drawer-url="route('admin.blog.tags.edit', [$tag, 'drawer' => 1])"
                    edit-title="Edit Tag"
                    :delete-url="route('admin.blog.tags.destroy', $tag)"
                    confirm="Hapus tag ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="px-4 py-8 text-center text-zinc-500">Belum ada tag.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $tags->links() }}
</div>
@endsection
