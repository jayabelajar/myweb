@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 text-white min-h-screen">
    <div class="max-w-6xl mx-auto pt-24"> <!-- Tampilan lebar untuk grid + padding top -->
        <div class="mb-16 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tighter leading-none mb-6">
                Tim Kami
            </h1>
            <p class="text-lg text-zinc-400 max-w-2xl mx-auto font-light leading-relaxed">
                Riwayat pendidikan anggota tim .
            </p>
        </div>

        <!-- Grid Anggota -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Anggota Mulyo Anjang (Moved to Top) -->
            <div class="bg-zinc-900/50 border border-white/10 rounded-2xl overflow-hidden hover:border-rose-500/30 transition-all duration-300 group">
                <!-- Foto & Header -->
                <div class="relative h-48 border-b border-white/5 bg-zinc-800">
                    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-60 transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('image/jaya.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-zinc-900/40"></div>
                    <img src="{{ asset('image/jaya.jpg') }}"
                        alt="Mulyo Anjang"
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-32 h-32 rounded-full border-4 border-zinc-900 shadow-xl object-cover z-10">
                </div>

                <div class="pt-20 px-6 pb-8 text-center">
                    <h3 class="text-xl font-bold text-white mb-1">Mulyo Anjang</h3>
                    <p class="text-rose-400 text-sm font-mono mb-6">Software Engineer</p>

                    <div class="text-left space-y-4 relative border-l border-zinc-700 ml-2 pl-4">
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-rose-500 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMK Negeri 1 Kraksaan</h4>
                            <p class="text-xs text-zinc-500">2018 - 2021</p>
                            <p class="text-xs text-zinc-400 mt-1">Jurusan Multimedia.</p>
                        </div>

                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMP Negeri 1 Besuk</h4>
                            <p class="text-xs text-zinc-500">2015 - 2018</p>
                        </div>

                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SD Negeri 1 Kota Contoh</h4>
                            <p class="text-xs text-zinc-500">2009 - 2015</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Anggota 1 -->
            <div class="bg-zinc-900/50 border border-white/10 rounded-2xl overflow-hidden hover:border-emerald-500/30 transition-all duration-300 group">
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <div class="relative h-48 border-b border-white/5 bg-zinc-800">
                    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-60 transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('image/hasan.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-zinc-900/40"></div>
                    <img src="{{ asset('image/hasan.jpg') }}"
                        alt="M. Hasan Basri"
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-32 h-32 rounded-full border-4 border-zinc-900 shadow-xl object-cover z-10">
                </div>

                <div class="pt-20 px-6 pb-8 text-center">
                    <h3 class="text-xl font-bold text-white mb-1">M. Hasan Basri</h3>
                    <p class="text-emerald-400 text-sm font-mono mb-6">Full Stack Developer</p>

                    <!-- Timeline Pendidikan Mini -->
                    <div class="text-left space-y-4 relative border-l border-zinc-700 ml-2 pl-4">
                        <!-- SMK -->
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-emerald-500 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMK Negeri 2 Kraksaan</h4>
                            <p class="text-xs text-zinc-500">2021 - 2024</p>
                            <p class="text-xs text-zinc-400 mt-1 line-clamp-2">Jurusan Teknik Sepeda Motor.</p>
                        </div>

                        <!-- SMP -->
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMP Negeri 1 Besuk</h4>
                            <p class="text-xs text-zinc-500">2018 - 2021</p>
                        </div>

                        <!-- SD -->
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SD Negeri 1 Kota Contoh</h4>
                            <p class="text-xs text-zinc-500">2011 - 2017</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Anggota 2 -->
            <div class="bg-zinc-900/50 border border-white/10 rounded-2xl overflow-hidden hover:border-blue-500/30 transition-all duration-300 group">
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <div class="relative h-48 border-b border-white/5 bg-zinc-800">
                    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-60 transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('image/arges.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-zinc-900/40"></div>
                    <img src="{{ asset('image/arges.jpg') }}"
                        alt="Argeswara"
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-32 h-32 rounded-full border-4 border-zinc-900 shadow-xl object-cover z-10">
                </div>

                <div class="pt-20 px-6 pb-8 text-center">
                    <h3 class="text-xl font-bold text-white mb-1">Argeswara</h3>
                    <p class="text-blue-400 text-sm font-mono mb-6">UI/UX Designer</p>

                    <div class="text-left space-y-4 relative border-l border-zinc-700 ml-2 pl-4">
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-blue-500 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMK Negeri 1 Jakarta</h4>
                            <p class="text-xs text-zinc-500">2021 - 2024</p>
                            <p class="text-xs text-zinc-400 mt-1">Jurusan Multimedia.</p>
                        </div>

                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMP Negeri 5 Jakarta</h4>
                            <p class="text-xs text-zinc-500">2018 - 2021</p>
                        </div>
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SD Negeri 1 Kota Contoh</h4>
                            <p class="text-xs text-zinc-500">2009 - 2015</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Anggota 3 -->
            <div class="bg-zinc-900/50 border border-white/10 rounded-2xl overflow-hidden hover:border-purple-500/30 transition-all duration-300 group">
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <!-- Foto & Header -->
                <div class="relative h-48 border-b border-white/5 bg-zinc-800">
                    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-60 transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('image/alan.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-zinc-900/40"></div>
                    <img src="{{ asset('image/alan.jpg') }}"
                        alt="Ahmad Maulana"
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-32 h-32 rounded-full border-4 border-zinc-900 shadow-xl object-cover z-10">
                </div>

                <div class="pt-20 px-6 pb-8 text-center">
                    <h3 class="text-xl font-bold text-white mb-1">Ahmad Maulana</h3>
                    <p class="text-purple-400 text-sm font-mono mb-6">Backend Engineer</p>

                    <div class="text-left space-y-4 relative border-l border-zinc-700 ml-2 pl-4">
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-purple-500 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMA Negeri 3 Bandung</h4>
                            <p class="text-xs text-zinc-500">2021 - 2024</p>
                            <p class="text-xs text-zinc-400 mt-1">Jurusan IPA.</p>
                        </div>

                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SMP Negeri 2 Bandung</h4>
                            <p class="text-xs text-zinc-500">2018 - 2021</p>
                        </div>
                        <div class="relative">
                            <span class="absolute -left-[21px] top-1.5 w-2.5 h-2.5 rounded-full bg-zinc-600 ring-4 ring-zinc-900"></span>
                            <h4 class="text-sm font-semibold text-zinc-200">SD Negeri 1 Kota Contoh</h4>
                            <p class="text-xs text-zinc-500">2009 - 2015</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
@endsection