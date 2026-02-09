@extends('layouts.app')

@section('content')
<section class="min-h-screen flex flex-col justify-center items-center text-center">
    <div class="mb-6 px-3 py-1 border border-white/10 bg-white/5 rounded-fll text-[11px] font-mono text-zinc-300">
        <span class="text-emerald-500 underline">Active</span> Portofolio Project
    </div>

    <h1 class="text-5xl md:text-8xl font-extrabold text-white tracking-tighter leading-none mb-8">
        Welcome to <br/>
        <span class="bg-gradient-to-b from-white to-zinc-500 bg-clip-text text-transparent italic">
            My Project.
        </span>
    </h1>

    <p class="text-lg md:text-xl text-zinc-400 max-w-2xl font-light leading-relaxed mb-10">
        I'm <span class="text-white font-medium">Argeswara Pradana K.</span>, a
        <span class="text-zinc-200">Web Developer</span>
        yang fokus membangun aplikasi web modern, cepat, dan scalable menggunakan
        teknologi Laravel, Tailwind CSS, dan JavaScript.
    </p>

    <div class="flex flex-col sm:flex-row gap-4">
        <a href="{{ route('biodata') }}"
           class="bg-white text-black px-8 py-2.5 rounded-md font-semibold text-sm hover:bg-zinc-200 transition shadow-[0_0_20px_rgba(255,255,255,0.2)]">
            Explore Identity
        </a>
        <a href="#"
           class="bg-transparent text-white border border-white/10 px-8 py-2.5 rounded-md font-medium text-sm hover:bg-white/5 transition">
            View on GitHub
        </a>
    </div>
</section>
@endsection
