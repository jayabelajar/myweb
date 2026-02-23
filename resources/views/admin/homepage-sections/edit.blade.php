@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Edit Homepage Section</h1>
        <p class="text-sm text-zinc-500">Update visibilitas dan urutan section homepage.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.homepage-sections.update', $section) }}" class="space-y-5">
    @csrf
    @method('PUT')
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Section Key</label>
            <select name="key" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
                @foreach ($availableSections as $key => $label)
                    <option value="{{ $key }}" @selected(old('key', $section->key) === $key)>{{ $label }} ({{ $key }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Display Name</label>
            <input name="name" value="{{ old('name', $section->name) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
        </div>
        <div class="md:col-span-2">
            <label class="inline-flex items-center gap-2 text-sm text-zinc-300">
                <input type="checkbox" name="is_active" value="1" class="rounded border-white/20 bg-black/40" @checked(old('is_active', $section->is_active))>
                Tampilkan section ini di homepage
            </label>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Update</button>
        @if (request('drawer'))
            <button
                type="button"
                class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white"
                onclick="window.parent?.postMessage({ type: 'drawer:close' }, '*')"
            >
                Cancel
            </button>
        @else
            <a href="{{ route('admin.homepage-sections.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
        @endif
    </div>
</form>
@endsection
