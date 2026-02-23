@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Teams</h1>
        <p class="text-sm text-zinc-500">Kelola anggota tim di halaman publik.</p>
    </div>
    <a href="{{ route('admin.teams.create') }}" data-drawer-url="{{ route('admin.teams.create', ['drawer' => 1]) }}" data-drawer-title="New Team Member" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Member
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Name'],
    ['label' => 'Role'],
    ['label' => 'Active'],
    ['label' => 'Order'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($teams as $team)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $team->name }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $team->role }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $team->is_active ? 'Yes' : 'No' }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $team->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.teams.edit', $team)"
                    :edit-drawer-url="route('admin.teams.edit', [$team, 'drawer' => 1])"
                    edit-title="Edit Team Member"
                    :delete-url="route('admin.teams.destroy', $team)"
                    confirm="Hapus anggota ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-zinc-500">Belum ada anggota tim.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $teams->links() }}
</div>
@endsection
