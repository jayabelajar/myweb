@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Workflow</h1>
        <p class="text-sm text-zinc-500">Kelola langkah workflow yang tampil di halaman Services.</p>
    </div>
    <a href="{{ route('admin.workflows.create') }}" data-drawer-url="{{ route('admin.workflows.create', ['drawer' => 1]) }}" data-drawer-title="New Workflow" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Step
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Label'],
    ['label' => 'Title'],
    ['label' => 'Description'],
    ['label' => 'Order', 'align' => 'right', 'nowrap' => true],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($steps as $step)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $step->label }}</td>
            <td class="px-4 py-3 text-zinc-300">{{ $step->title }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $step->description }}</td>
            <td class="px-4 py-3 text-right text-zinc-500">{{ $step->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.workflows.edit', $step)"
                    :edit-drawer-url="route('admin.workflows.edit', [$step, 'drawer' => 1])"
                    edit-title="Edit Workflow"
                    :delete-url="route('admin.workflows.destroy', $step)"
                    confirm="Hapus workflow ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-zinc-500">Belum ada workflow.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $steps->links() }}
</div>
@endsection