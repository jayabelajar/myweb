@extends('layouts.app')

@section('title', 'The Team')

@section('content')
<section class="flex flex-col items-center justify-center">

    {{-- ========================================== --}}
    {{-- HERO SECTION --}}
    {{-- ========================================== --}}
    
    <div class="text-center mb-20 md:mb-32 mt-10">
        {{-- Label --}}
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[10px] font-mono text-emerald-400 tracking-widest uppercase mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Our Team
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tighter text-white mb-6">
            The <span class="text-zinc-500">Architect.</span>
        </h1>
        
        <p class="text-zinc-400 max-w-2xl mx-auto text-lg font-light leading-relaxed">
            Tim berpengalaman yang fokus pada kualitas, keandalan, dan eksekusi dengan perhatian pada detail dan kebutuhan bisnis.
        </p>
    </div>

    {{-- ========================================== --}}
    {{-- TEAM GRID --}}
    {{-- ========================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl mx-auto mb-32">
        
        {{-- Member Card 1 (Lead/Founder) --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            {{-- Image Container --}}
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                {{-- Placeholder Image (Ganti src dengan foto asli) --}}
                <img src="{{ asset('image/jaya.png') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                
                {{-- Overlay Gradient --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                
                {{-- Status Indicator --}}
                <div class="absolute top-4 right-4 px-2 py-1 bg-black/50 backdrop-blur-md rounded border border-white/10 text-[10px] font-mono text-emerald-400 flex items-center gap-1.5">
                    <span class="w-1 h-1 rounded-full bg-emerald-500"></span>
                    Lead
                </div>
            </div>

            {{-- Content --}}
            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="text-xs font-mono text-zinc-200 mb-1 uppercase tracking-widest">Fullstack Engineer</div>
                <h3 class="text-2xl font-bold text-white mb-3">Jaya Kusuma</h3>
                <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                    Spesialis dalam arsitektur microservices dan optimasi database skala besar.
                </p>
                
                {{-- Social Icons --}}
                <div class="flex gap-4 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="https://github.com/jayabelajar" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">GitHub</a>
                    <a href="https://linkedin.com/in/jykusuma" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">LinkedIn</a>
                </div>
            </div>
        </div>

        {{-- Member Card 2 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('image/hasan.jpg') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="text-xs font-mono text-zinc-200 mb-1 uppercase tracking-widest">UI/UX Designer</div>
                <h3 class="text-2xl font-bold text-white mb-3">Argeswara</h3>
                <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                    Menciptakan pengalaman digital yang intuitif dengan fokus pada aksesibilitas.
                </p>
                <div class="flex gap-4 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">Dribbble</a>
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">Instagram</a>
                </div>
            </div>
        </div>

        {{-- Member Card 3 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('image/arges.jpg') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="text-xs font-mono text-zinc-200 mb-1 uppercase tracking-widest">DevOps Engineer</div>
                <h3 class="text-2xl font-bold text-white mb-3">Hasan Basri</h3>
                <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                    Menjaga infrastruktur cloud tetap stabil dengan CI/CD otomatis.
                </p>
                <div class="flex gap-4 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">GitHub</a>
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">Twitter</a>
                </div>
            </div>
        </div>

        {{-- Member Card 4 --}}
        <div class="group relative bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition-all duration-500">
            <div class="aspect-[4/5] w-full overflow-hidden bg-zinc-800 relative grayscale group-hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('image/alan.jpg') }}" 
                     alt="Member Name" 
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                <div class="text-xs font-mono text-zinc-200 mb-1 uppercase tracking-widest">Product Manager</div>
                <h3 class="text-2xl font-bold text-white mb-3">Ahmad Alan</h3>
                <p class="text-zinc-200 text-sm opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-75 mb-4 leading-relaxed line-clamp-2">
                    Menjembatani visi bisnis dan eksekusi teknis dengan roadmap yang jelas.
                </p>
                <div class="flex gap-4 pt-4 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">LinkedIn</a>
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors text-xs uppercase">Medium</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- CULTURE / VALUES SECTION --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-6xl mx-auto mb-20 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-white mb-6">Our DNA.</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">01</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Quality over Quantity</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Kami lebih memilih merilis satu fitur sempurna daripada sepuluh fitur yang setengah matang.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">02</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Always Learning</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Teknologi berubah setiap detik. Kami beradaptasi dan belajar lebih cepat dari perubahan itu sendiri.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-zinc-600 font-mono">03</div>
                        <div>
                            <h4 class="text-white font-semibold mb-1">Ego-less Code</h4>
                            <p class="text-sm text-zinc-500 leading-relaxed">Kode terbaik adalah hasil kolaborasi, bukan arogansi. Kami terbuka terhadap kritik dan perbaikan.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Visual / Quote --}}
            <div class="h-full min-h-[300px] rounded-2xl border border-white/5 bg-zinc-900/30 p-8 flex flex-col justify-between relative overflow-hidden group">
                 <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 blur-[80px] pointer-events-none group-hover:bg-emerald-500/20 transition-colors duration-700"></div>
                 
                 <div class="text-6xl text-white/5 font-serif">"</div>
                 <blockquote class="text-xl md:text-2xl text-zinc-300 font-light leading-relaxed relative z-10">
                    "Great software is built by great teams, not just great individuals. We invest in people first."
                 </blockquote>
                 <div class="text-sm font-mono text-emerald-400 mt-6 relative z-10">— VeritasDev</div>
            </div>
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- JOIN US CTA --}}
    {{-- ========================================== --}}

    <div class="w-full max-w-2xl mx-auto text-center mb-20 px-6">
        <h2 class="text-2xl font-bold text-white mb-4">Are you one of us?</h2>
        <p class="text-zinc-400 text-sm mb-8">
            Kami selalu mencari talenta berbakat yang memiliki passion di bidang Engineering dan Design.
        </p>
        <a href="mailto:careers@veritasdev.com" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-200 transition-transform hover:scale-105">
            Apply Now <span class="text-lg leading-none">&rarr;</span>
        </a>
    </div>

</section>
@endsection
