@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Service Packages</h1>
        <p class="text-sm text-zinc-500">Kelola paket layanan yang tampil di halaman Services.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" data-drawer-url="{{ route('admin.services.create', ['drawer' => 1]) }}" data-drawer-title="New Package" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Package
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Category'],
    ['label' => 'Package'],
    ['label' => 'Price Range'],
    ['label' => 'Order'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($services as $service)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-zinc-400">{{ $service->label }}</td>
            <td class="px-4 py-3 text-white font-semibold">{{ $service->title }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $service->price ?? '-' }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $service->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.services.edit', $service)"
                    :edit-drawer-url="route('admin.services.edit', [$service, 'drawer' => 1])"
                    edit-title="Edit Package"
                    :delete-url="route('admin.services.destroy', $service)"
                    confirm="Hapus package ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-zinc-500">Belum ada package.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $services->links() }}
</div>
@endsection
