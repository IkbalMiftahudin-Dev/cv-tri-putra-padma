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
        
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shadow-xl z-20">
            <div class="h-16 flex items-center px-6 bg-slate-950 text-white font-bold text-lg tracking-wider border-b border-slate-800">
                <i class="fa-solid fa-helmet-safety text-blue-500 mr-3 text-xl"></i>
                <span>TRIPUTRA ADMIN</span>
            </div>

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
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shadow-sm z-10">
                <h2 class="text-lg font-bold text-slate-800">Dashboard Panel</h2>
                <div class="flex items-center space-x-3 border-l pl-4 border-slate-200">
                    <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shadow">A</div>
                    <span class="text-sm font-semibold text-slate-700">Administrator</span>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-100 p-8">
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
</body>
</html>