<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CV Tri Putra Padma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Overlay untuk Mobile saat Sidebar Terbuka -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-slate-950/50 z-20 hidden md:hidden transition-opacity"></div>

        <!-- Sidebar (Responsive Drawer) -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-slate-300 flex flex-col shadow-2xl transition-transform duration-300 -translate-x-full md:translate-x-0 md:static md:inset-auto">
            <div class="h-16 flex items-center justify-between px-6 bg-slate-950 text-white font-bold text-lg tracking-wider border-b border-slate-800">
                <div class="flex items-center">
                    <i class="fa-solid fa-helmet-safety text-blue-500 mr-3 text-xl"></i>
                    <span>TRIPUTRA ADMIN</span>
                </div>
                <!-- Tombol Close khusus Mobile -->
                <button id="sidebar-close" class="md:hidden text-slate-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('services.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('services.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-server w-6 text-center mr-3"></i> Layanan
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('projects.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-briefcase w-6 text-center mr-3"></i> Proyek
                </a>
                <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('testimonials.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-comments w-6 text-center mr-3"></i> Testimoni
                </a>
                <a href="{{ route('settings.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->routeIs('settings.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-gears w-6 text-center mr-3"></i> Pengaturan
                </a>
            </nav>

            <div class="p-4 bg-slate-950/50 border-t border-slate-800">
                <a href="{{ url('/') }}" target="_blank" class="flex items-center justify-center w-full px-4 py-2.5 rounded-xl text-sm font-medium bg-slate-800 hover:bg-slate-700 text-slate-200 transition">
                    <i class="fa-solid fa-globe mr-2"></i> Lihat Website
                </a>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Top Header -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 md:px-8 shadow-sm z-10">
                <div class="flex items-center space-x-3">
                    <!-- Tombol Hamburger untuk Toggle Sidebar di Mobile -->
                    <button id="sidebar-toggle" class="md:hidden text-slate-600 hover:text-slate-900 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-base md:text-lg font-bold text-slate-800">Dashboard Panel</h2>
                </div>
                
                <div class="flex items-center space-x-3 border-l pl-4 border-slate-200">
                    <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shadow">A</div>
                    <span class="text-sm font-semibold text-slate-700 hidden sm:inline">Administrator</span>
                </div>
            </header>

            <!-- Main Content Container -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 p-4 md:p-8">
                @if(session('success'))
                    <div class="flex items-center bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-sm mb-6">
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