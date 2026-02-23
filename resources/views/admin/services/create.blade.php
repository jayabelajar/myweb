@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">New Service</h1>
        <p class="text-sm text-zinc-500">Tambah layanan baru.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Label</label>
            <input name="label" value="{{ old('label') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Title</label>
            <input name="title" value="{{ old('title') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Price</label>
            <input name="price" value="{{ old('price') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Contoh: Mulai Rp 7jt">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Image</label>
            <input type="file" name="image" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Upload gambar, maks 4MB.</p>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Description</label>
            <textarea name="description" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>{{ old('description') }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Benefits (satu per baris)</label>
            <textarea name="benefits" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Contoh:&#10;Role-based access&#10;Integrasi API&#10;Deployment + support">{{ old('benefits') }}</textarea>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Save</button>
        <a href="{{ route('admin.services.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
    </div>
</form>
@endsection
