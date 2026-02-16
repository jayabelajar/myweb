@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-100">Contact Settings</h1>
            <p class="text-sm text-zinc-500">Kelola konten halaman publik contact dan WhatsApp.</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.contact.update') }}" class="rounded-2xl border border-white/5 bg-[#0e1318]/70 p-6 shadow-2xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact?->email) }}" placeholder="hello@veritasdev.com" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
            </div>
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Location</label>
                <input type="text" name="location" value="{{ old('location', $contact?->location) }}" placeholder="Jakarta, Indonesia" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
            </div>
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Availability Text</label>
                <input type="text" name="availability_text" value="{{ old('availability_text', $contact?->availability_text) }}" placeholder="Mon-Fri, 09.00-18.00" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
            </div>
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Availability Note</label>
                <input type="text" name="availability_note" value="{{ old('availability_note', $contact?->availability_note) }}" placeholder="WIB / GMT+7" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-5">
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Project Inquiry Title</label>
                <input type="text" name="inquiry_title" value="{{ old('inquiry_title', $contact?->inquiry_title) }}" placeholder="Project Inquiry" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
            </div>
            <div>
                <label class="text-xs uppercase tracking-widest text-zinc-500">Project Inquiry Subtitle</label>
                <textarea name="inquiry_subtitle" rows="4" placeholder="Ceritakan kebutuhan Anda..." class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30">{{ old('inquiry_subtitle', $contact?->inquiry_subtitle) }}</textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">Inquiry Button Text</label>
                    <input type="text" name="inquiry_button" value="{{ old('inquiry_button', $contact?->inquiry_button) }}" placeholder="Submit" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
                </div>
                <div>
                    <label class="text-xs uppercase tracking-widest text-zinc-500">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $contact?->whatsapp_number) }}" placeholder="6285859400250" class="mt-2 w-full rounded-xl bg-black/50 border border-white/10 px-4 py-3 text-sm text-white placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/30" />
                    <p class="mt-2 text-[11px] text-zinc-500">Gunakan format internasional tanpa tanda +.</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-white text-black text-xs font-semibold uppercase tracking-widest px-6 py-3 hover:bg-zinc-200 transition">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection