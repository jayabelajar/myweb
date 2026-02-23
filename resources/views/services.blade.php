@extends('layouts.app')

@section('title', 'Services')

@section('content')
<section class="flex flex-col items-center justify-center">

    <div class="text-center mb-16 md:mb-24 mt-6 reveal-up" data-reveal>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-sky-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
            Web Development Studio
        </div>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tighter text-white mb-6 reveal-up" data-reveal>
            Services <span class="text-zinc-500">That Scale.</span>
        </h1>
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed reveal-up" data-reveal data-reveal-delay="80">
            Fokus pada web development: landing page high-convert, aplikasi dashboard, dan platform SaaS dengan arsitektur rapi dan performa stabil.
        </p>
    </div>

    <div class="w-full max-w-6xl mx-auto mb-20 reveal-up" data-reveal>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                @php $featured = $loop->iteration === 2; @endphp
                <article class="relative rounded-3xl border p-7 md:p-8 flex flex-col min-h-[560px] backdrop-blur-sm {{ $featured ? 'border-sky-400/50 bg-sky-500/[0.08] shadow-[0_0_40px_rgba(56,189,248,0.16)]' : 'border-white/10 bg-zinc-900/40' }}">
                    @if ($featured)
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full border border-sky-400/40 bg-sky-500/20 px-4 py-1 text-[10px] font-semibold uppercase tracking-widest text-sky-200">
                            Most Picked
                        </div>
                    @endif

                    <div class="text-center">
                        <div class="text-xs font-mono uppercase tracking-[0.2em] text-sky-300">{{ $service->label }}</div>
                        <h3 class="mt-3 text-2xl font-bold tracking-tight text-white">{{ $service->title }}</h3>
                        <div class="mx-auto mt-4 h-px w-28 bg-gradient-to-r from-transparent via-sky-400/60 to-transparent"></div>
                    </div>

                    <div class="mt-7 text-center">
                        <div class="text-2xl md:text-3xl font-bold tracking-tight text-white">{{ $service->price }}</div>
                    </div>

                    <ul class="mt-6 space-y-3 text-sm">
                        @php
                            $defaultBenefits = [
                                'Discovery dan requirement mapping',
                                'UI implementasi responsive (mobile + desktop)',
                                'Revisi minor sampai 2x',
                                'QA testing sebelum go-live',
                                'Timeline pengerjaan dan milestone jelas',
                                'Dokumentasi handover',
                                'Support pasca-launch 14 hari',
                            ];
                            $extraBenefits = [
                                'Source code full access',
                                'Optimasi basic performance',
                                'Konsultasi teknis selama pengerjaan',
                            ];
                            $benefits = !empty($service->benefits)
                                ? array_values(array_unique(array_merge($service->benefits, $extraBenefits)))
                                : $defaultBenefits;
                        @endphp
                        @foreach ($benefits as $benefit)
                            <li class="flex items-start gap-2">
                                <span class="mt-1 inline-block h-2 w-2 rounded-full bg-sky-400"></span>
                                <span class="text-zinc-200">{{ $benefit }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('contact') }}" class="mt-auto inline-flex items-center justify-center rounded-full border px-6 py-3 text-xs font-semibold uppercase tracking-widest transition {{ $featured ? 'border-sky-300/50 bg-sky-400/20 text-sky-100 hover:bg-sky-400/30' : 'border-white/15 bg-white/5 text-zinc-200 hover:border-sky-300/40 hover:text-white' }}">
                        Pilih Paket
                    </a>
                </article>
            @endforeach
        </div>
    </div>

</section>
@endsection
