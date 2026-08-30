<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - CV. Tri Putra Padma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white p-6 hidden md:block">
            <h2 class="font-bold text-lg mb-6">Admin Panel</h2>
            <nav class="space-y-2 text-sm font-medium">
                <a href="{{ route('services.index') }}" class="block px-4 py-2.5 rounded-xl hover:bg-slate-800 transition">Layanan</a>
                <a href="{{ route('projects.index') }}" class="block px-4 py-2.5 rounded-xl hover:bg-slate-800 transition">Proyek</a>
                <a href="{{ route('testimonials.index') }}" class="block px-4 py-2.5 rounded-xl hover:bg-slate-800 transition">Testimoni</a>
                <a href="{{ route('settings.index') }}" class="block px-4 py-2.5 rounded-xl hover:bg-slate-800 transition">Pengaturan</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b border-slate-200 h-16 flex items-center px-8 shadow-sm">
                <h1 class="font-bold text-slate-800">Dashboard Manajemen</h1>
            </header>
            <main class="p-8">
                @if(session('success'))
                    <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>