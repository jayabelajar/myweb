@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Pricing</h1>
        <p class="text-sm text-zinc-500">Kelola paket pricing yang tampil di halaman Services.</p>
    </div>
    <a href="{{ route('admin.pricing.create') }}" data-drawer-url="{{ route('admin.pricing.create', ['drawer' => 1]) }}" data-drawer-title="New Pricing" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Plan
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Name'],
    ['label' => 'Price'],
    ['label' => 'CTA'],
    ['label' => 'Highlight', 'align' => 'right', 'nowrap' => true],
    ['label' => 'Order', 'align' => 'right', 'nowrap' => true],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($plans as $plan)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-white font-semibold">{{ $plan->name }}</td>
            <td class="px-4 py-3 text-zinc-300">{{ $plan->price }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $plan->cta_label }}</td>
            <td class="px-4 py-3 text-right text-zinc-500">{{ $plan->highlight ? 'Yes' : 'No' }}</td>
            <td class="px-4 py-3 text-right text-zinc-500">{{ $plan->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.pricing.edit', $plan)"
                    :edit-drawer-url="route('admin.pricing.edit', [$plan, 'drawer' => 1])"
                    edit-title="Edit Pricing"
                    :delete-url="route('admin.pricing.destroy', $plan)"
                    confirm="Hapus pricing ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-8 text-center text-zinc-500">Belum ada pricing.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $plans->links() }}
</div>
@endsection