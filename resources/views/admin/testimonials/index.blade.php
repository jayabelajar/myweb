@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Testimonials</h1>
        <p class="text-sm text-zinc-500">Kelola testimonial tipe company dan person di homepage.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" data-drawer-url="{{ route('admin.testimonials.create', ['drawer' => 1]) }}" data-drawer-title="New Testimonial" class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Testimonial
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Type'],
    ['label' => 'Name'],
    ['label' => 'Role / Company Info'],
    ['label' => 'Active'],
    ['label' => 'Order'],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($testimonials as $testimonial)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-zinc-400 uppercase text-xs tracking-widest">{{ $testimonial->type }}</td>
            <td class="px-4 py-3 text-white font-semibold">{{ $testimonial->name }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $testimonial->role ?: '-' }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $testimonial->is_active ? 'Yes' : 'No' }}</td>
            <td class="px-4 py-3 text-zinc-500">{{ $testimonial->sort_order }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.testimonials.edit', $testimonial)"
                    :edit-drawer-url="route('admin.testimonials.edit', [$testimonial, 'drawer' => 1])"
                    edit-title="Edit Testimonial"
                    :delete-url="route('admin.testimonials.destroy', $testimonial)"
                    confirm="Hapus testimonial ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-8 text-center text-zinc-500">Belum ada testimonial.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $testimonials->links() }}
</div>
@endsection
