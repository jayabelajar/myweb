@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Projects</h1>
        <p class="text-sm text-zinc-500">Kelola data proyek yang tampil di halaman publik.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" data-drawer-url="{{ route('admin.projects.create', ['drawer' => 1]) }}" data-drawer-title="New Project" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Project
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Title'],
    ['label' => 'Category'],
    ['label' => 'Stack'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($projects as $project)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $project->title }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $project->category }}</td>
            <td class="px-4 py-3 text-zinc-500">
                {{ $project->stack ? implode(', ', $project->stack) : '-' }}
            </td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.projects.edit', $project)"
                    :edit-drawer-url="route('admin.projects.edit', [$project, 'drawer' => 1])"
                    edit-title="Edit Project"
                    :delete-url="route('admin.projects.destroy', $project)"
                    confirm="Hapus project ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-4 py-8 text-center text-zinc-500">Belum ada project.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $projects->links() }}
</div>
@endsection
