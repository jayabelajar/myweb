@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-white">New Contact</h1>
        <p class="text-sm text-zinc-500">Tambah data contact baru.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.contact.store') }}" class="space-y-5">
    @csrf
    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="hello@veritasdev.com" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Location</label>
            <input type="text" name="location" value="{{ old('location') }}" placeholder="Jakarta, Indonesia" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Availability Text</label>
            <input type="text" name="availability_text" value="{{ old('availability_text') }}" placeholder="Mon-Fri, 09.00-18.00" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Availability Note</label>
            <input type="text" name="availability_note" value="{{ old('availability_note') }}" placeholder="WIB / GMT+7" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Project Inquiry Title</label>
            <input type="text" name="inquiry_title" value="{{ old('inquiry_title') }}" placeholder="Project Inquiry" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div class="md:col-span-2">
            <label class="text-xs uppercase tracking-widest text-zinc-500">Project Inquiry Subtitle</label>
            <textarea name="inquiry_subtitle" rows="4" placeholder="Ceritakan kebutuhan Anda..." class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">{{ old('inquiry_subtitle') }}</textarea>
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">Inquiry Button Text</label>
            <input type="text" name="inquiry_button" value="{{ old('inquiry_button') }}" placeholder="Submit" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
        </div>
        <div>
            <label class="text-xs uppercase tracking-widest text-zinc-500">WhatsApp Number</label>
            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="6285859400250" class="mt-2 w-full rounded-xl border border-white/10 bg-black/40 px-4 py-3 text-sm text-white">
            <p class="mt-2 text-[11px] text-zinc-500">Gunakan format internasional tanpa tanda +.</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/10 px-6 py-2 text-xs uppercase tracking-widest text-white hover:border-white/30">Save</button>
        <a href="{{ route('admin.contact.index') }}" class="text-xs uppercase tracking-widest text-zinc-400 hover:text-white">Cancel</a>
    </div>
</form>
@endsection
