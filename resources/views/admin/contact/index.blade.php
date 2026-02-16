@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Contact</h1>
        <p class="text-sm text-zinc-500">Kelola data contact yang tampil di halaman publik.</p>
    </div>
    <a href="{{ route('admin.contact.create') }}"
       data-drawer-url="{{ route('admin.contact.create', ['drawer' => 1]) }}"
       data-drawer-title="New Contact"
       class="inline-flex items-center justify-center rounded-full border border-white/10 px-4 py-2 text-xs uppercase tracking-widest text-zinc-300 hover:text-white hover:border-white/30">
        New Contact
    </a>
</div>

<x-admin.table :headers="[
    ['label' => 'Email'],
    ['label' => 'Location'],
    ['label' => 'WhatsApp'],
    ['label' => 'Updated', 'nowrap' => true],
    ['label' => 'Actions', 'align' => 'right', 'nowrap' => true],
]">
    @forelse ($contacts as $contact)
        <tr class="hover:bg-white/5">
            <td class="px-4 py-3 text-zinc-200">{{ $contact->email ?: '-' }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $contact->location ?: '-' }}</td>
            <td class="px-4 py-3 text-zinc-400">{{ $contact->whatsapp_number ?: '-' }}</td>
            <td class="px-4 py-3 text-zinc-500 whitespace-nowrap">{{ $contact->updated_at?->format('d M Y') }}</td>
            <td class="px-4 py-3 text-right align-middle whitespace-nowrap">
                <x-admin.action-buttons
                    :edit-url="route('admin.contact.edit', $contact)"
                    :edit-drawer-url="route('admin.contact.edit', [$contact, 'drawer' => 1])"
                    edit-title="Edit Contact"
                    :delete-url="route('admin.contact.destroy', $contact)"
                    confirm="Hapus contact ini?"
                />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-zinc-500">Belum ada data contact.</td>
        </tr>
    @endforelse
</x-admin.table>

<div class="mt-6">
    {{ $contacts->links() }}
</div>
@endsection
