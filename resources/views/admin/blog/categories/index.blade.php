@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Blog Categories</h1>
        <p class="text-sm text-zinc-500">Kelola kategori blog.</p>
    </div>
    <a href="{{ route('admin.blog.categories.create') }}" data-drawer-url="{{ route('admin.blog.categories.create', ['drawer' => 1]) }}" data-drawer-title="New Category" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Category
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Name'],
    ['label' => 'Slug'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($categories as $category)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $category->name }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $category->slug }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.blog.categories.edit', $category)"
                    :edit-drawer-url="route('admin.blog.categories.edit', [$category, 'drawer' => 1])"
                    edit-title="Edit Category"
                    :delete-url="route('admin.blog.categories.destroy', $category)"
                    confirm="Hapus category ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="px-4 py-8 text-center text-zinc-500">Belum ada category.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $categories->links() }}
</div>
@endsection
