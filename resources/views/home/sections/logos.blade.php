<div class="w-full max-w-6xl mx-auto mb-24 reveal-up" data-reveal>
    <div class="text-center mb-8">
        <p class="text-xs uppercase tracking-widest text-zinc-500">Trusted by teams</p>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 items-center">
        @forelse ($companyTestimonials as $companyTestimonial)
            <div class="h-16 rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">
                {{ $companyTestimonial->name }}
            </div>
        @empty
            <div class="h-16 col-span-full rounded-xl border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 text-xs uppercase tracking-widest">
                Belum ada testimonial perusahaan
            </div>
        @endforelse
    </div>
</div>
