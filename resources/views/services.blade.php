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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mb-20 reveal-up" data-reveal>
        @foreach ($services as $service)
            <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
                <div class="relative h-36 rounded-xl overflow-hidden border border-white/5 mb-5">
                    <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 via-transparent to-sky-500/10"></div>
                    @php
                        $image = $service->image;
                        $imageUrl = $image
                            ? (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '//']) ? $image : asset('storage/' . $image))
                            : 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80';
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-90">
                </div>
                <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-3">{{ $service->label }}</div>
                <h3 class="text-xl font-bold text-white mb-2">{{ $service->title }}</h3>
                <p class="text-sm text-zinc-400">{{ $service->description }}</p>
            </div>
        @endforeach
    </div>

    <div class="w-full max-w-6xl mx-auto mb-20 reveal-up" data-reveal>
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-white tracking-tight mb-2">
                Workflow <span class="text-zinc-500">Execution.</span>
            </h2>
            <p class="text-zinc-500 text-sm max-w-sm mx-auto">
                Proses kerja yang rapi untuk memastikan hasil konsisten, timeline jelas, dan komunikasi transparan.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($workflows as $workflow)
                <div class="bg-zinc-900/30 border border-white/5 rounded-2xl p-6">
                    <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-3">{{ $workflow->label }}</div>
                    <h3 class="text-xl font-bold text-white mb-2">{{ $workflow->title }}</h3>
                    <p class="text-sm text-zinc-400">{{ $workflow->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto mb-20 reveal-up" data-reveal>
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-white tracking-tight mb-2">
                Pricing <span class="text-zinc-500">Plans.</span>
            </h2>
            <p class="text-zinc-500 text-sm max-w-sm mx-auto">
                Pilih paket sesuai kebutuhan, scope, dan target delivery.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($plans as $plan)
                <div class="bg-zinc-900/30 border {{ $plan->highlight ? 'border-sky-500/40 shadow-[0_0_40px_rgba(59,130,246,0.12)]' : 'border-white/5' }} rounded-2xl p-6">
                    <div class="text-xs font-mono text-sky-400 uppercase tracking-widest mb-3">{{ $plan->name }}</div>
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $plan->price }}</h3>
                    <p class="text-sm text-zinc-400 mb-6">{{ $plan->description }}</p>
                    <ul class="text-sm text-zinc-500 space-y-2">
                        @foreach ($plan->features ?? [] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('contact') }}" class="inline-flex mt-6 items-center gap-2 text-xs uppercase tracking-widest text-sky-400 hover:text-sky-300">
                        {{ $plan->cta_label }} <span class="text-sm">&rarr;</span>
                    </a>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-zinc-500 mt-4">Harga estimasi, disesuaikan scope dan timeline.</p>
    </div>

</section>
@endsection
