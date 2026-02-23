@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">New Testimonial</h1>
        <p class="text-sm text-zinc-500">Tambah testimonial untuk company atau person.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Type</label>
            <select name="type" id="testimonial-type" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" required>
                @foreach ($types as $value => $label)
                    <option value="{{ $value }}" @selected(old('type', 'person') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Name</label>
            <input name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Nama orang / perusahaan" required>
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Role / Company Info</label>
            <input name="role" value="{{ old('role') }}" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Contoh: CTO, FinTech ID">
        </div>
        <div class="md:col-span-2" id="quote-field">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Quote (khusus person)</label>
            <textarea name="quote" rows="4" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">{{ old('quote') }}</textarea>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Badge / Initial</label>
            <input name="badge" value="{{ old('badge') }}" maxlength="20" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white" placeholder="Contoh: AD">
        </div>
        <div id="photo-field">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Photo (khusus person)</label>
            <input type="file" name="photo_url" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Upload foto testimonial, maks 4MB.</p>
        </div>
        <div class="flex items-end">
            <label class="inline-flex items-center gap-2 text-sm text-zinc-300">
                <input type="checkbox" name="is_active" value="1" class="rounded border-white/20 bg-black/40" @checked(old('is_active', true))>
                Tampilkan di homepage
            </label>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Save</button>
        @if (request('drawer'))
            <button
                type="button"
                class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white"
                onclick="window.parent?.postMessage({ type: 'drawer:close' }, '*')"
            >
                Cancel
            </button>
        @else
            <a href="{{ route('admin.testimonials.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
        @endif
    </div>
</form>

<script>
    (function () {
        const typeSelect = document.getElementById('testimonial-type');
        const quoteField = document.getElementById('quote-field');
        const photoField = document.getElementById('photo-field');
        if (!typeSelect || !quoteField || !photoField) return;

        const updateQuoteVisibility = () => {
            const isCompany = typeSelect.value === 'company';
            quoteField.style.display = isCompany ? 'none' : '';
            photoField.style.display = isCompany ? 'none' : '';
        };

        updateQuoteVisibility();
        typeSelect.addEventListener('change', updateQuoteVisibility);
    })();
</script>
@endsection
