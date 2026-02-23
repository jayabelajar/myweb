@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Homepage Sections</h1>
        <p class="text-sm text-zinc-500">Atur urutan section yang muncul di homepage.</p>
    </div>
    <a href="{{ route('admin.homepage-sections.create') }}" data-drawer-url="{{ route('admin.homepage-sections.create', ['drawer' => 1]) }}" data-drawer-title="New Homepage Section" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Section
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Section Key'],
    ['label' => 'Section Name'],
    ['label' => 'Status'],
    ['label' => 'Order'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($sections as $section)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-zinc-400 font-mono">{{ $section->key }}</td>
            <td class="px-4 py-3 text-white font-semibold">{{ $section->name }}</td>
            <td class="px-4 py-3">
                @if ($section->is_active)
                    <span class="inline-flex rounded-full border border-emerald-500/20 bg-emerald-500/10 px-2 py-1 text-[11px] uppercase tracking-widest text-emerald-300">Active</span>
                @else
                    <span class="inline-flex rounded-full border border-zinc-500/20 bg-zinc-500/10 px-2 py-1 text-[11px] uppercase tracking-widest text-zinc-400">Hidden</span>
                @endif
            </td>
            <td class="px-4 py-3 text-zinc-500">{{ $section->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.homepage-sections.edit', $section)"
                    :edit-drawer-url="route('admin.homepage-sections.edit', [$section, 'drawer' => 1])"
                    edit-title="Edit Homepage Section"
                    :delete-url="route('admin.homepage-sections.destroy', $section)"
                    confirm="Hapus section ini dari homepage?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-zinc-500">Belum ada section homepage.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $sections->links() }}
</div>
@endsection
