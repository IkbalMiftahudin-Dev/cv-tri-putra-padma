<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['company_name'] ?? 'CV. Tri Putra Padma' }} - Solusi Air Bersih & Aman di Indonesia</title>
    <!-- Tailwind CSS Play CDN & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Leaflet CSS untuk Peta Interaktif -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        @keyframes ripple {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 0.3; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }
        @keyframes floatBubble {
            0% { transform: translateY(0px) scale(1); opacity: 0; }
            50% { opacity: 0.7; }
            100% { transform: translateY(-160px) scale(1.35); opacity: 0; }
        }
        @keyframes waveMove1 {
            0% { transform: translateX(0) translateZ(0) scaleY(1); }
            50% { transform: translateX(-25%) translateZ(0) scaleY(1.2); }
            100% { transform: translateX(-50%) translateZ(0) scaleY(1); }
        }
        @keyframes waveMove2 {
            0% { transform: translateX(0) translateZ(0); }
            50% { transform: translateX(-35%) translateZ(0); }
            100% { transform: translateX(-70%) translateZ(0); }
        }
        .animate-ripple { animation: ripple 4s ease-in-out infinite; }
        
        .bubble {
            position: absolute;
            bottom: -20px;
            background: rgba(56, 189, 248, 0.35);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBubble 6s infinite ease-in;
        }

        .wave-bg-1 {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-50-200.8 0-250 50-394.5 50v31.8h800v-31.8z' fill='%230284c7' fill-opacity='0.25'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            animation: waveMove1 12s linear infinite;
        }
        .wave-bg-2 {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-50-200.8 0-250 50-394.5 50v31.8h800v-31.8z' fill='%2338bdf8' fill-opacity='0.20'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            animation: waveMove2 7s linear infinite;
        }

        .hero-water-gradient {
            background: linear-gradient(135deg, #020617 0%, #07263d 45%, #024f85 100%);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .map-overlay {
            pointer-events: none;
            transition: background-color 0.3s ease;
        }
        .map-active .map-overlay {
            display: none;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] font-sans text-slate-800 antialiased selection:bg-cyan-500 selection:text-white">

    <!-- TOP BAR INFO -->
    <div class="bg-slate-950 text-slate-400 text-xs py-2.5 border-b border-slate-900 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center"><i class="fa-solid fa-envelope text-cyan-400 mr-2"></i> {{ $settings['email'] ?? 'info@triputrapadma.com' }}</span>
                <span class="flex items-center"><i class="fa-solid fa-phone text-cyan-400 mr-2"></i> {{ $settings['phone'] ?? '+62 838-4461-9720' }}</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-emerald-400 font-medium flex items-center"><span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping mr-2"></span> Jam Kerja: Sen - Sab 08.00 - 17.00</span>
                <a href="{{ route('login') }}" class="hover:text-white transition font-medium text-slate-300 bg-slate-900 px-3 py-1 rounded-md border border-slate-800">Login Admin</a>
            </div>
        </div>
    </div>

    <!-- NAVBAR RESPONSIF SEMUA LAYAR -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/60 shadow-xs transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-tr from-cyan-600 to-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-cyan-500/25 relative overflow-hidden flex-shrink-0">
                    <div class="absolute inset-0 bg-white/20 animate-ripple"></div>
                    <i class="fa-solid fa-droplet text-lg sm:text-xl relative z-10"></i>
                </div>
                <div>
                    <span class="block font-black text-slate-900 leading-none text-sm sm:text-lg tracking-tight">CV. TRI PUTRA</span>
                    <span class="block text-[10px] sm:text-xs font-extrabold text-cyan-600 tracking-[0.25em] uppercase mt-0.5">PADMA</span>
                </div>
            </div>

            <nav class="hidden lg:flex items-center space-x-8 font-semibold text-sm text-slate-600">
            <button onclick="openFounderModal()" class="hover:text-cyan-600 transition cursor-pointer bg-transparent border-none font-semibold text-sm text-slate-600">
                Tentang Kami
            </button>
            
            <a href="#layanan" class="hover:text-cyan-600 transition">Layanan</a>
            <a href="#sebaran" class="hover:text-cyan-600 transition">Sebaran Proyek</a>
            <a href="#alur" class="hover:text-cyan-600 transition">Alur Kerja</a>
            <a href="#testimoni" class="hover:text-cyan-600 transition">Testimoni</a>
            <a href="#kontak" class="hover:text-cyan-600 transition">Kontak</a>
        </nav>

            <div class="hidden lg:flex items-center space-x-3">
                <a href="#kontak" class="bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-cyan-600/25 text-sm transition transform hover:-translate-y-0.5 flex items-center space-x-2">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>Mulai Konsultasi</span>
                </a>
            </div>

            <!-- Hamburger Button -->
            <button id="mobile-menu-button" aria-label="Buka Menu Navigasi" class="lg:hidden text-slate-700 hover:text-cyan-600 focus:outline-none p-2.5 rounded-xl bg-slate-100 transition cursor-pointer">
                <i class="fa-solid fa-bars text-xl" id="menu-icon"></i>
            </button>
        </div>

<div id="mobile-menu" class="hidden lg:hidden flex flex-col space-y-4 p-6 bg-white border-b border-slate-200 shadow-lg">
    
    <button onclick="openFounderModal()" class="text-left font-semibold text-sm text-slate-600 hover:text-cyan-600 transition cursor-pointer">
        Tentang Kami
    </button>

    <a href="#layanan" onclick="closeMobileMenu()" class="font-semibold text-sm text-slate-600 hover:text-cyan-600 transition">Layanan</a>
    <a href="#sebaran" onclick="closeMobileMenu()" class="font-semibold text-sm text-slate-600 hover:text-cyan-600 transition">Sebaran Proyek</a>
    <a href="#alur" onclick="closeMobileMenu()" class="font-semibold text-sm text-slate-600 hover:text-cyan-600 transition">Alur Kerja</a>
    <a href="#testimoni" onclick="closeMobileMenu()" class="font-semibold text-sm text-slate-600 hover:text-cyan-600 transition">Testimoni</a>
    <a href="#kontak" onclick="closeMobileMenu()" class="font-semibold text-sm text-slate-600 hover:text-cyan-600 transition">Kontak</a>
</div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative hero-water-gradient text-white py-20 sm:py-28 lg:py-36 overflow-hidden">
        <div class="absolute inset-x-0 bottom-0 h-32 sm:h-40 opacity-45 pointer-events-none wave-bg-1 z-0"></div>
        <div class="absolute inset-x-0 bottom-0 h-40 sm:h-48 opacity-30 pointer-events-none wave-bg-2 z-0" style="bottom: -10px;"></div>

        <div class="bubble" style="left: 8%; width: 14px; height: 14px; animation-duration: 5s; animation-delay: 0s;"></div>
        <div class="bubble" style="left: 22%; width: 10px; height: 10px; animation-duration: 7s; animation-delay: 2s;"></div>
        <div class="bubble" style="left: 45%; width: 20px; height: 20px; animation-duration: 6s; animation-delay: 1s;"></div>
        <div class="bubble" style="left: 70%; width: 12px; height: 12px; animation-duration: 8s; animation-delay: 3s;"></div>
        <div class="bubble" style="left: 88%; width: 16px; height: 16px; animation-duration: 5.5s; animation-delay: 1.5s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-2 bg-cyan-500/15 border border-cyan-400/30 px-4 py-2 rounded-full text-cyan-300 text-xs font-bold tracking-wider uppercase shadow-inner backdrop-blur-md">
                        <i class="fa-solid fa-water text-cyan-400 animate-bounce"></i>
                        <span>Spesialis Aliran & Pemurnian Air Profesional</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight leading-[1.15]">
                        SOLUSI AIR BERSIH & AMAN <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-sky-200 to-blue-300">DI INDONESIA</span>
                    </h1>

                    <p class="text-slate-300 text-base sm:text-lg leading-relaxed font-normal max-w-2xl mx-auto lg:mx-0">
                        {{ $settings['tagline'] ?? 'Spesialis Instalasi Pipa, Sistem Filter, & Maintenance Bergaransi untuk Hunian, Komersial, & Industri.' }}
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 pt-2">
                        <a href="#kontak" class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-extrabold px-8 py-4 rounded-2xl shadow-xl shadow-cyan-500/25 transition transform hover:-translate-y-0.5 text-sm flex items-center justify-center space-x-3">
                            <span>Konsultasi Gratis</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="#layanan" class="bg-white/10 hover:bg-white/15 border border-white/20 text-white font-bold px-8 py-4 rounded-2xl transition backdrop-blur-md text-sm flex items-center justify-center space-x-2">
                            <span>Pelajari Layanan</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="bg-slate-900/50 backdrop-blur-2xl border border-cyan-500/30 p-6 sm:p-8 rounded-3xl shadow-2xl relative overflow-hidden group">
                        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-cyan-400/20 rounded-full blur-2xl animate-pulse"></div>
                        <div class="relative z-10 space-y-4">
                            <div class="w-14 h-14 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-cyan-500/30">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h3 class="font-bold text-xl sm:text-2xl text-white">Komitmen Kualitas Air</h3>
                            <p class="text-slate-300 text-sm leading-relaxed">Setiap instalasi dikerjakan oleh teknisi ahli tersertifikasi dengan jaminan garansi resmi hingga 1 tahun penuh.</p>
                            <div class="pt-4 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between text-xs font-semibold text-cyan-300 gap-2">
                                <span class="flex items-center"><i class="fa-solid fa-circle-check mr-2 text-emerald-400"></i> Material SNI</span>
                                <span class="flex items-center"><i class="fa-solid fa-circle-check mr-2 text-emerald-400"></i> Respon Cepat</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENTO GRID LAYANAN -->
    <section id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 sm:-mt-20 relative z-20 mb-16 sm:mb-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-4 bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/70 flex flex-col justify-between">
            <div>
                <div class="inline-flex items-center px-3.5 py-1.5 bg-cyan-50 text-cyan-700 rounded-xl text-xs font-bold mb-4 border border-cyan-100">
                    <i class="fa-solid fa-award mr-1.5 text-cyan-500"></i> Keunggulan Utama
                </div>
                <h3 class="font-black text-slate-900 text-xl sm:text-2xl mb-6 tracking-tight">Mengapa Memilih Kami?</h3>
                <ul class="space-y-3.5 text-xs sm:text-sm font-semibold text-slate-700">
                    <li class="flex items-center bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                        <i class="fa-solid fa-circle-check text-cyan-500 mr-3 text-lg flex-shrink-0"></i> Teknisi Bersertifikat Resmi
                    </li>
                    <li class="flex items-center bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                        <i class="fa-solid fa-circle-check text-cyan-500 mr-3 text-lg flex-shrink-0"></i> Garansi Kebocoran 1 Tahun
                    </li>
                    <li class="flex items-center bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                        <i class="fa-solid fa-circle-check text-cyan-500 mr-3 text-lg flex-shrink-0"></i> Pengerjaan Cepat & Tepat Waktu
                    </li>
                    <li class="flex items-center bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                        <i class="fa-solid fa-circle-check text-cyan-500 mr-3 text-lg flex-shrink-0"></i> Material Standar SNI
                    </li>
                </ul>
            </div>
        </div>

        <div class="lg:col-span-8 bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/70 flex flex-col justify-between">
            <div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 sm:mb-8 gap-4">
                    <div>
                        <span class="text-cyan-600 text-xs font-bold uppercase tracking-wider">Keahlian Kami</span>
                        <h3 class="font-black text-slate-900 text-xl sm:text-2xl tracking-tight">Layanan Utama</h3>
                    </div>
                    <div class="w-full sm:w-auto">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-search text-xs"></i>
                            </span>
                            <input type="text" id="service-search" placeholder="Cari dari 50+ layanan..." class="w-full sm:w-64 pl-9 pr-4 py-2.5 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-cyan-500 transition shadow-inner">
                        </div>
                    </div>
                </div>

               <div id="services-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
    @forelse($services as $index => $service)
        {{-- Card Layanan dibuat bisa diklik untuk memunculkan modal detail --}}
        <div onclick="openServiceModal('{{ addslashes($service->name) }}', '{{ addslashes($service->description) }}', '{{ $service->icon ?? 'fa-solid fa-water' }}')" 
             class="service-card bg-gradient-to-b from-slate-50 to-cyan-50/10 border border-slate-200/70 p-5 sm:p-6 rounded-2xl text-center hover:shadow-lg hover:border-cyan-500/40 transition-all group flex flex-col items-center justify-between cursor-pointer {{ $index >= 8 ? 'hidden' : '' }}" 
             data-name="{{ strtolower($service->name) }}">
            
            <div class="w-14 h-14 bg-gradient-to-tr from-cyan-600 to-blue-600 text-white rounded-2xl flex items-center justify-center text-xl mb-4 shadow-md shadow-cyan-500/20 group-hover:scale-110 transition-transform flex-shrink-0">
                <i class="{{ $service->icon ?? 'fa-solid fa-water' }}"></i>
            </div>
            
            <div class="w-full">
                <h4 class="font-bold text-sm text-slate-900 mb-1 line-clamp-1 group-hover:text-cyan-600 transition">{{ $service->name }}</h4>
                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $service->description }}</p>
            </div>

            <div class="mt-4 pt-3 border-t border-slate-100 w-full flex items-center justify-center text-[11px] font-semibold text-cyan-600">
                <span>Lihat Detail</span>
                <i class="fa-solid fa-arrow-right ml-1.5 group-hover:translate-x-1 transition"></i>
            </div>
        </div>
    @empty
        <div class="col-span-4 text-center py-12 text-slate-400 text-sm">Belum ada data layanan dari panel admin.</div>
    @endforelse
</div>

                <div id="no-service-found" class="hidden text-center py-8 text-slate-400 text-xs">
                    Layanan yang kamu cari tidak ditemukan. Coba kata kunci lain, mas bro!
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- SEBARAN PROYEK & ALUR KERJA -->
    <section id="sebaran" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 sm:mb-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/70 relative">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                    <div>
                        <span class="text-cyan-600 text-xs font-bold uppercase tracking-wider">Jangkauan Nasional</span>
                        <h3 class="font-black text-slate-900 text-xl sm:text-2xl tracking-tight">Peta Sebaran Proyek</h3>
                    </div>
                    <span class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-md shadow-cyan-500/20">
                        {{ isset($projects) ? $projects->count() : 0 }}+ Proyek Selesai
                    </span>
                </div>
                
                <div class="relative rounded-2xl overflow-hidden border border-slate-200/80 shadow-inner">
                    <div id="indonesia-map" class="h-72 sm:h-80 w-full z-10"></div>
                    <div id="map-overlay" class="map-overlay absolute inset-0 bg-slate-900/10 z-20 flex items-center justify-center backdrop-blur-[1px] cursor-pointer sm:hidden">
                        <span class="bg-slate-900/90 text-white text-[11px] font-semibold px-4 py-2 rounded-full shadow-lg border border-white/10">Ketuk untuk Mengaktifkan Peta</span>
                    </div>
                </div>
            </div>

            <div id="alur" class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/70 flex flex-col justify-between">
                <div>
                    <span class="text-cyan-600 text-xs font-bold uppercase tracking-wider">Standar Operasional</span>
                    <h3 class="font-black text-slate-900 text-xl sm:text-2xl mb-6 tracking-tight">Alur Kerja</h3>
                    
                    <div class="space-y-3.5">
                        <div class="flex items-center space-x-4 bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                            <div class="w-10 h-10 bg-cyan-600 text-white rounded-xl flex items-center justify-center font-black text-sm flex-shrink-0 shadow-md shadow-cyan-500/20">1</div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Survei Lokasi</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500">Pengecekan dan analisa kebutuhan air langsung.</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                            <div class="w-10 h-10 bg-cyan-600 text-white rounded-xl flex items-center justify-center font-black text-sm flex-shrink-0 shadow-md shadow-cyan-500/20">2</div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Perencanaan & Estimasi</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500">Penyusunan desain dan RAB transparan.</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                            <div class="w-10 h-10 bg-cyan-600 text-white rounded-xl flex items-center justify-center font-black text-sm flex-shrink-0 shadow-md shadow-cyan-500/20">3</div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Eksekusi Pengerjaan</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500">Pemasangan oleh teknisi ahli material SNI.</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100">
                            <div class="w-10 h-10 bg-cyan-600 text-white rounded-xl flex items-center justify-center font-black text-sm flex-shrink-0 shadow-md shadow-cyan-500/20">4</div>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-slate-900">Uji Coba & Serah Terima</h4>
                                <p class="text-[11px] sm:text-xs text-slate-500">Testing sistem, aliran lancar, garansi aktif.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONI KLIEN (SLIDER MODERN & FORM PUBLIK) -->
    <section id="testimoni" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 sm:mb-24 overflow-hidden">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 sm:mb-12 gap-4">
            <div>
                <span class="text-cyan-600 font-bold text-xs uppercase tracking-widest bg-cyan-50 px-4 py-1.5 rounded-full border border-cyan-100 inline-block mb-3">★ Ulasan Kepuasan Klien</span>
                <h3 class="font-black text-slate-900 text-2xl sm:text-3xl tracking-tight">Apa Kata Mereka Tentang Layanan Kami?</h3>
            </div>
            
            <div class="flex items-center space-x-3">
                <button onclick="openTestimonialModal()" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold px-5 py-2.5 rounded-2xl shadow-lg shadow-cyan-600/20 text-xs sm:text-sm transition flex items-center space-x-2 cursor-pointer">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Tulis Testimoni</span>
                </button>
                
                <div class="flex items-center space-x-2 border-l border-slate-200 pl-3">
                    <button id="slide-prev" aria-label="Sebelumnya" class="w-10 h-10 bg-white hover:bg-cyan-600 hover:text-white text-slate-700 border border-slate-200 rounded-xl flex items-center justify-center transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </button>
                    <button id="slide-next" aria-label="Selanjutnya" class="w-10 h-10 bg-white hover:bg-cyan-600 hover:text-white text-slate-700 border border-slate-200 rounded-xl flex items-center justify-center transition shadow-xs cursor-pointer">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        @if(session('success_testimonial'))
            <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 px-6 py-4 rounded-2xl text-xs sm:text-sm flex items-center space-x-3 shadow-sm">
                <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                <span>{{ session('success_testimonial') }}</span>
            </div>
        @endif

        <div class="relative">
            <div id="testimonial-slider" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-6 pt-2 no-scrollbar focus:outline-none">
                @forelse($testimonials as $testimonial)
                    <div class="w-full sm:w-[380px] md:w-[420px] flex-shrink-0 snap-start bg-white p-7 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/70 flex flex-col justify-between hover:border-cyan-500/40 transition-all group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-amber-400 text-sm space-x-0.5">
                                    @for($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                                </div>
                                <span class="text-slate-300 font-black text-3xl leading-none group-hover:text-cyan-500/20 transition">“</span>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 italic leading-relaxed mb-6">"{{ $testimonial->review }}"</p>
                        </div>
                        <div class="border-t border-slate-100 pt-4 flex items-center space-x-3.5">
                            <div class="w-11 h-11 bg-gradient-to-tr from-cyan-600 to-blue-600 text-white font-bold rounded-2xl flex items-center justify-center text-sm shadow-md shadow-cyan-500/20 flex-shrink-0">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-bold text-xs sm:text-sm text-slate-900">{{ $testimonial->client_name }}</div>
                                <div class="text-[11px] text-cyan-600 font-medium flex items-center mt-0.5">
                                    <i class="fa-solid fa-building mr-1 text-[10px]"></i> {{ $testimonial->company_origin ?? 'Klien Mandiri' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center text-slate-400 text-sm py-12 bg-white rounded-3xl border border-slate-200">Belum ada testimoni dari klien. Jadilah yang pertama memberikan ulasan!</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- MODAL FORM TESTIMONI KLIEN -->
    <div id="testimonial-modal" class="fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-xs hidden items-center justify-center px-4">
        <div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl border border-slate-200 overflow-hidden transform transition-all">
            <div class="bg-slate-900 text-white px-6 py-5 flex justify-between items-center">
                <div>
                    <h4 class="font-bold text-base">Kirim Ulasan & Testimoni</h4>
                    <p class="text-xs text-slate-400">Bagikan pengalaman Anda menggunakan layanan kami</p>
                </div>
                <button onclick="closeTestimonialModal()" class="w-8 h-8 bg-slate-800 hover:bg-slate-700 rounded-xl flex items-center justify-center text-slate-300 transition cursor-pointer">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </div>

            <form action="{{ route('testimonials.public.store') }}" method="POST" class="p-6 sm:p-8 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" name="client_name" required placeholder="Cth: Budi Santoso" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-cyan-500 transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Asal Perusahaan / Instansi / Domisili</label>
                    <input type="text" name="company_origin" placeholder="Cth: PT Sumber Makmur / Bandung" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-cyan-500 transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Rating Kepuasan <span class="text-rose-500">*</span></label>
                    <select name="rating" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-cyan-500 transition">
                        <option value="5">★★★★★ (5/5 - Sangat Puas)</option>
                        <option value="4">★★★★☆ (4/5 - Puas)</option>
                        <option value="3">★★★☆☆ (3/5 - Cukup)</option>
                        <option value="2">★★☆☆☆ (2/5 - Kurang)</option>
                        <option value="1">★☆☆☆☆ (1/5 - Buruk)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Ulasan & Pesan Anda <span class="text-rose-500">*</span></label>
                    <textarea name="review" rows="4" required placeholder="Tuliskan pengalaman pelayanan kami..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-cyan-500 transition"></textarea>
                </div>

                <div class="pt-2 flex justify-end space-x-3">
                    <button type="button" onclick="closeTestimonialModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition cursor-pointer">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-cyan-600 hover:bg-cyan-700 text-white font-bold text-xs rounded-xl shadow-md transition cursor-pointer">Kirim Ulasan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-slate-950 text-slate-300 pt-16 sm:pt-20 pb-12 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 mb-16">
                <div class="lg:col-span-5 space-y-4">
                    <div class="flex items-center space-x-3 mb-2">
                        <div class="w-10 h-10 bg-cyan-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-cyan-500/20">
                            <i class="fa-solid fa-droplet text-lg"></i>
                        </div>
                        <span class="font-bold text-white text-lg tracking-tight">CV. Tri Putra Padma</span>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-sm">
                        {{ $settings['tagline'] ?? 'Solusi terpercaya penyedia layanan instalasi pipa air bersih, filter air profesional, dan maintenance bergaransi di Indonesia.' }}
                    </p>
                </div>

                <div class="lg:col-span-7 space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-widest uppercase mb-4">Kontak & Lokasi Kantor</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                        <div class="bg-slate-900/60 p-5 rounded-2xl border border-slate-800/80 space-y-3">
                            <p class="flex items-center space-x-3"><i class="fa-solid fa-envelope text-cyan-400 w-5 flex-shrink-0"></i> <span class="truncate">{{ $settings['email'] ?? 'info@triputrapadma.com' }}</span></p>
                            <p class="flex items-center space-x-3"><i class="fa-solid fa-phone text-cyan-400 w-5 flex-shrink-0"></i> <span>{{ $settings['phone'] ?? '+62 838-4461-9720' }}</span></p>
                        </div>
                        <div class="bg-slate-900/60 p-5 rounded-2xl border border-slate-800/80 space-y-2">
                            <p class="flex items-start space-x-3"><i class="fa-solid fa-location-dot text-cyan-400 w-5 mt-0.5 flex-shrink-0"></i> <span class="leading-relaxed">{{ $settings['address'] ?? 'Indonesia' }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-900 pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 space-y-4 sm:space-y-0 text-center sm:text-left">
                <div>&copy; {{ date('Y') }} CV. Tri Putra Padma. All rights reserved.</div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/6283844619720" target="_blank" aria-label="Chat WhatsApp" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-4 py-3 sm:px-5 sm:py-3.5 rounded-full shadow-2xl flex items-center space-x-2.5 transition transform hover:scale-105 group border-2 border-emerald-400/50">
            <i class="fa-brands fa-whatsapp text-2xl group-hover:rotate-12 transition"></i>
            <span class="text-xs font-bold pr-1 hidden sm:inline">Chat WA 0838-4461-9720</span>
        </a>
    </div>

    <!-- Leaflet JS & Script Handlers -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      // 1. Mobile Menu Toggle (Bawaan Asli + Penyesuaian)
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    function closeMobileMenu() {
        if(mobileMenu && menuIcon) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('fa-xmark');
            menuIcon.classList.add('fa-bars');
        }
    }

    if(menuButton && mobileMenu && menuIcon) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if(mobileMenu.classList.contains('hidden')) {
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
            } else {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
            }
        });
    }

    // 2. Popup Founder (Tentang Kami)
    function openFounderModal() {
        closeMobileMenu(); // Tutup menu mobile dulu kalau sedang terbuka
        
        const modal = document.getElementById('founderModal');
        const content = document.getElementById('modalContent');
        
        if (modal && content) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }
    }

    function closeFounderModal() {
        const modal = document.getElementById('founderModal');
        const content = document.getElementById('modalContent');
        
        if (modal && content) {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'pointer-events-none');
            
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }
    }

    // Tutup modal jika user klik area luar
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('founderModal');
        if (e.target === modal) {
            closeFounderModal();
        }
    });

        // 2. Realtime Search Layanan (Sinkronisasi limit 8 awal & pencarian dinamis)
        const searchInput = document.getElementById('service-search');
        const serviceCards = document.querySelectorAll('.service-card');
        const noFoundMsg = document.getElementById('no-service-found');

        if(searchInput) {
            searchInput.addEventListener('input', (e) => {
                const keyword = e.target.value.toLowerCase().trim();
                let visibleCount = 0;

                serviceCards.forEach(card => {
                    const name = card.getAttribute('data-name');
                    if (name.includes(keyword)) {
                        card.classList.remove('hidden');
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                        card.style.display = 'none';
                    }
                });

                if (keyword === '') {
                    serviceCards.forEach((card, index) => {
                        if (index >= 8) {
                            card.classList.add('hidden');
                            card.style.display = 'none';
                        } else {
                            card.classList.remove('hidden');
                            card.style.display = 'flex';
                        }
                    });
                }

                if (noFoundMsg) {
                    if (visibleCount === 0 && keyword !== '') {
                        noFoundMsg.classList.remove('hidden');
                    } else {
                        noFoundMsg.classList.add('hidden');
                    }
                }
            });
        }

        // 3. Testimonial Slider
        const testimonialSlider = document.getElementById('testimonial-slider');
        const btnPrev = document.getElementById('slide-prev');
        const btnNext = document.getElementById('slide-next');

        if(testimonialSlider && btnPrev && btnNext) {
            const scrollAmount = 420;
            btnPrev.addEventListener('click', () => {
                testimonialSlider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            btnNext.addEventListener('click', () => {
                testimonialSlider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }

        // 4. Testimonial Modal Global Functions
        window.openTestimonialModal = function() {
            const testimonialModal = document.getElementById('testimonial-modal');
            if(testimonialModal) {
                testimonialModal.classList.remove('hidden');
                testimonialModal.classList.add('flex');
            }
        };

        window.closeTestimonialModal = function() {
            const testimonialModal = document.getElementById('testimonial-modal');
            if(testimonialModal) {
                testimonialModal.classList.remove('flex');
                testimonialModal.classList.add('hidden');
            }
        };

        // 5. Leaflet Map Sebaran Proyek Nasional
        const mapElement = document.getElementById('indonesia-map');
        if (mapElement) {
            const map = L.map('indonesia-map', {
                dragging: !L.Browser.mobile,
                tap: !L.Browser.mobile
            }).setView([-2.548926, 118.014863], 4);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const projects = @json($projects ?? []);

            if (Array.isArray(projects)) {
                projects.forEach(project => {
                    if(project.latitude && project.longitude) {
                        let projectName = project.title || 'Proyek Tanpa Nama';
                        let projectLocation = project.location || '';
                        
                        let projectImage = project.image ? 
                            (project.image.startsWith('http') ? project.image : `/storage/${project.image}`) : 
                            null;

                        let imageHtml = projectImage ? 
                            `<div style="margin-bottom:6px;"><img src="${projectImage}" style="width:100%; height:90px; object-fit:cover; border-radius:6px;" alt="${projectName}"></div>` : 
                            '';

                        let popupContent = `
                            <div style="padding:2px; width:140px;">
                                ${imageHtml}
                                <b style="font-size:11px; color:#1e293b; display:block; line-height:1.2;">${projectName}</b>
                                <span style="font-size:10px; color:#64748b;">${projectLocation}</span>
                            </div>
                        `;

                        L.marker([project.latitude, project.longitude]).addTo(map)
                            .bindPopup(popupContent);
                    }
                });
            }

            const mapContainer = mapElement.parentElement;
            const mapOverlay = document.getElementById('map-overlay');
            if(mapContainer && mapOverlay) {
                mapContainer.addEventListener('click', () => {
                    map.dragging.enable();
                    map.scrollWheelZoom.enable();
                    mapContainer.classList.add('map-active');
                });
            }
        }
    });
</script>
<!-- Modal Popup Profil Pendiri -->
<div id="founderModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs opacity-0 pointer-events-none transition-opacity duration-300">
    
    <!-- Kotak Konten Modal -->
    <div id="modalContent" class="bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-2xl w-full overflow-hidden transform scale-95 transition-transform duration-300 relative">
        
        <!-- Tombol Close (X) di Pojok Kanan Atas -->
        <button onclick="closeFounderModal()" class="absolute top-4 right-4 z-20 w-10 h-10 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-full flex items-center justify-center transition cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="grid grid-cols-1 sm:grid-cols-12 items-stretch">
            
            <!-- Foto Pendiri di Modal -->
            <div class="sm:col-span-5 relative bg-slate-900 min-h-[250px] sm:min-h-full">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="Bpk. Aceng Sutisna" class="absolute inset-0 w-full h-full object-cover object-top">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent sm:hidden"></div>
                <div class="absolute bottom-4 left-4 text-white sm:hidden">
                    <h3 class="font-bold text-lg">Bpk. Aceng Sutisna</h3>
                    <p class="text-xs text-slate-300">Founder CV. Tri Putra Padma</p>
                </div>
            </div>

            <!-- Detail Teks Profil di Modal -->
            <div class="sm:col-span-7 p-6 sm:p-8 flex flex-col justify-between">
                <div>
                    <span class="inline-block text-blue-600 font-bold text-[10px] uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-md mb-2">
                        Pimpinan & Visi Perusahaan
                    </span>
                    <h3 class="hidden sm:block text-xl font-bold text-slate-900">Bpk.   Aceng Sutisna</h3>
                    <p class="hidden sm:block text-xs text-blue-600 font-medium mb-4">Founder & Direktur Utama</p>

                    <blockquote class="text-slate-600 text-xs sm:text-sm leading-relaxed italic border-l-2 border-blue-600 pl-3 my-2">
                        "Komitmen kami adalah menghadirkan solusi utilitas bangunan dan perpipaan berstandar tinggi yang memberikan ketenangan jangka panjang bagi setiap klien."
                    </blockquote>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="block text-slate-400 font-semibold uppercase">Pengalaman</span>
                        <span class="text-slate-800 font-bold">15+ Tahun</span>
                    </div>
                    <div>
                        <span class="block text-slate-400 font-semibold uppercase">Spesialisasi</span>
                        <span class="text-slate-800 font-bold">Mekanikal & Pipa</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script JavaScript untuk Kontrol Popup -->
<script>
    function openFounderModal() {
        const modal = document.getElementById('founderModal');
        const content = document.getElementById('modalContent');
        
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        
        content.classList.remove('scale-95');
        content.classList.add('scale-100');
    }

    function closeFounderModal() {
        const modal = document.getElementById('founderModal');
        const content = document.getElementById('modalContent');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');
        
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
    }

    // Tutup popup jika user klik di luar kotak modal
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('founderModal');
        if (e.target === modal) {
            closeFounderModal();
        }
    });
</script>

<!-- Modal Popup Detail Layanan -->
<div id="serviceModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs opacity-0 pointer-events-none transition-opacity duration-300">
    
    <!-- Kotak Konten Modal -->
    <div id="serviceModalContent" class="bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-lg w-full p-6 sm:p-8 transform scale-95 transition-transform duration-300 relative">
        
        <!-- Tombol Close (X) -->
        <button onclick="closeServiceModal()" class="absolute top-4 right-4 z-20 w-10 h-10 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-full flex items-center justify-center transition cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- Icon & Judul Layanan di Modal -->
        <div class="flex items-center space-x-4 mb-5">
            <div class="w-14 h-14 bg-gradient-to-tr from-cyan-600 to-blue-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-md shrink-0">
                <i id="modalServiceIcon" class="fa-solid fa-water"></i>
            </div>
            <div>
                <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-wider bg-cyan-50 px-2.5 py-1 rounded-md">Detail Layanan</span>
                <h3 id="modalServiceTitle" class="text-xl font-bold text-slate-900 mt-1">Nama Layanan</h3>
            </div>
        </div>

        <!-- Deskripsi Lengkap (Tidak Terpotong) -->
        <div class="max-h-[60vh] overflow-y-auto pr-1">
            <p id="modalServiceDesc" class="text-slate-600 text-sm sm:text-base leading-relaxed whitespace-pre-line">
                Deskripsi lengkap akan muncul di sini...
            </p>
        </div>

        <!-- Tombol Aksi Cepat / Hubungi via WhatsApp -->
        <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between gap-4 flex-wrap">
            <span class="text-xs text-slate-400">Tertarik dengan layanan ini?</span>
            <a href="https://wa.me/6283844619720?text=Halo%20CV%20Tri%20Putra%20Padma,%20saya%20tertarik%20dengan%20layanan..." target="_blank" rel="noopener noreferrer" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition flex items-center shadow-lg shadow-emerald-600/20">
                <i class="fa-brands fa-whatsapp mr-2 text-base"></i> Konsultasi via WhatsApp
            </a>
        </div>

    </div>
</div>

<script>
    // Fungsi Membuka Modal Layanan
    function openServiceModal(title, description, iconClass) {
        const modal = document.getElementById('serviceModal');
        const content = document.getElementById('serviceModalContent');
        
        // Masukkan data dinamis ke dalam elemen modal
        document.getElementById('modalServiceTitle').innerText = title;
        document.getElementById('modalServiceDesc').innerText = description;
        document.getElementById('modalServiceIcon').className = iconClass;
        
        // Tampilkan modal dengan animasi halus
        if (modal && content) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }
    }

    // Fungsi Menutup Modal Layanan
    function closeServiceModal() {
        const modal = document.getElementById('serviceModal');
        const content = document.getElementById('serviceModalContent');
        
        if (modal && content) {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'pointer-events-none');
            
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }
    }

    // Tutup modal layanan jika pengguna mengklik area gelap di luar kotak putih
    window.addEventListener('click', function(e) {
        const serviceModal = document.getElementById('serviceModal');
        if (e.target === serviceModal) {
            closeServiceModal();
        }
    });
</script>
</body>
</html>