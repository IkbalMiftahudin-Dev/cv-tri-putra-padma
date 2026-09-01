<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CV Tri Putra Padma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes wave-primary {
            0% { transform: translateX(0); }
            50% { transform: translateX(-25%); }
            100% { transform: translateX(-50%); }
        }
        @keyframes wave-secondary {
            0% { transform: translateX(0); }
            50% { transform: translateX(-15%); }
            100% { transform: translateX(-30%); }
        }
        .animate-wave-1 {
            animation: wave-primary 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
        }
        .animate-wave-2 {
            animation: wave-secondary 12s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            opacity: 0.4;
        }
        /* Custom scrollbar tipis untuk sidebar */
        aside nav::-webkit-scrollbar {
            width: 4px;
        }
        aside nav::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Overlay untuk Mobile saat Sidebar Terbuka -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-slate-950/70 z-30 hidden md:hidden backdrop-blur-xs transition-opacity"></div>

        <!-- Sidebar (Responsive Drawer dengan Efek Air Dinamis) -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-75 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-slate-300 flex flex-col shadow-2xl transition-transform duration-300 -translate-x-full md:translate-x-0 md:static md:inset-auto overflow-hidden border-r border-slate-800/80">
            
            <!-- Brand / Logo Header -->
            <div class="h-20 flex items-center justify-between px-6 bg-slate-950/60 backdrop-blur-md text-white border-b border-slate-800/80 relative z-20">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600/20 border border-blue-500/30 flex items-center justify-center text-blue-400 shadow-inner">
                        <i class="fa-solid fa-water text-xl"></i>
                    </div>
                    <div>
                        <span class="block font-bold tracking-wider text-sm text-white">TRIPUTRA</span>
                        <span class="block text-[10px] text-blue-400 font-semibold tracking-widest uppercase">Admin Control</span>
                    </div>
                </div>
                <!-- Tombol Close khusus Mobile -->
                <button id="sidebar-close" class="md:hidden text-slate-400 hover:text-white p-1">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto relative z-20">
                <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-500">Menu Utama</div>
                
                <a href="{{ route('services.index') }}" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('services.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/40 ring-1 ring-blue-400/30' : 'hover:bg-slate-800/70 hover:text-white text-slate-300' }}">
                    <i class="fa-solid fa-server w-6 text-center mr-3 {{ request()->routeIs('services.*') ? 'text-white' : 'text-blue-400' }}"></i> Layanan
                </a>
                
                <a href="{{ route('projects.index') }}" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('projects.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/40 ring-1 ring-blue-400/30' : 'hover:bg-slate-800/70 hover:text-white text-slate-300' }}">
                    <i class="fa-solid fa-briefcase w-6 text-center mr-3 {{ request()->routeIs('projects.*') ? 'text-white' : 'text-blue-400' }}"></i> Proyek
                </a>
                
                <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('testimonials.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/40 ring-1 ring-blue-400/30' : 'hover:bg-slate-800/70 hover:text-white text-slate-300' }}">
                    <i class="fa-solid fa-comments w-6 text-center mr-3 {{ request()->routeIs('testimonials.*') ? 'text-white' : 'text-blue-400' }}"></i> Testimoni
                </a>
                
                <a href="{{ route('settings.index') }}" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('settings.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/40 ring-1 ring-blue-400/30' : 'hover:bg-slate-800/70 hover:text-white text-slate-300' }}">
                    <i class="fa-solid fa-gears w-6 text-center mr-3 {{ request()->routeIs('settings.*') ? 'text-white' : 'text-blue-400' }}"></i> Pengaturan
                </a>
            </nav>

            <!-- Bagian Bawah dengan Animasi Gelombang Air & Tombol Website -->
            <div class="relative pt-12 pb-5 px-4 bg-slate-950/90 border-t border-slate-800/80 z-20 overflow-hidden">
                <!-- Elemen Gelombang Air Bergerak (SVG Wave Layer 1) -->
                <div class="absolute inset-x-0 bottom-0 pointer-events-none overflow-hidden leading-none opacity-25">
                    <svg class="relative block w-[200%] h-12 animate-wave-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,10 1200,30 L1200,120 L0,120 Z" fill="#2563eb"></path>
                    </svg>
                </div>
                <!-- Elemen Gelombang Air Bergerak (SVG Wave Layer 2) -->
                <div class="absolute inset-x-0 bottom-0 pointer-events-none overflow-hidden leading-none opacity-15">
                    <svg class="relative block w-[200%] h-14 animate-wave-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,30 C200,110 400,0 600,50 C800,100 1000,10 1200,40 L1200,120 L0,120 Z" fill="#60a5fa"></path>
                    </svg>
                </div>

                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer" class="flex items-center px-4 py-3 text-slate-600 hover:bg-slate-100 rounded-xl transition">
    <i class="fa-solid fa-globe mr-3 text-slate-400"></i> 
    <span>Lihat Website Utama</span>
    <i class="fa-solid ml-auto text-xs text-slate-400"></i>
</a>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Top Header -->
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200/80 flex items-center justify-between px-6 md:px-10 shadow-xs z-20">
                <div class="flex items-center space-x-4">
                    <!-- Tombol Hamburger untuk Toggle Sidebar di Mobile -->
                    <button id="sidebar-toggle" class="md:hidden text-slate-600 hover:text-slate-900 focus:outline-none p-2 rounded-lg hover:bg-slate-100 transition">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-slate-800 tracking-tight">Dashboard Utama</h2>
                        <p class="text-xs text-slate-500 hidden sm:block">Panel kontrol manajemen sistem CV Tri Putra Padma</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3.5 border-l pl-5 border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-blue-400 text-white flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20">A</div>
                    <div class="hidden sm:block text-left">
                        <span class="block text-sm font-bold text-slate-700 leading-tight">Administrator</span>
                        <span class="block text-[11px] text-emerald-600 font-medium">● Online System</span>
                    </div>
                </div>
            </header>

            <!-- Main Content Container -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/50 p-6 md:p-10">
                @if(session('success'))
                    <div class="flex items-center bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-xs mb-6 border border-emerald-100">
                        <i class="fa-solid fa-circle-check text-emerald-500 mr-3 text-lg"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Script Sederhana untuk Toggle Sidebar Mobile -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarClose.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>