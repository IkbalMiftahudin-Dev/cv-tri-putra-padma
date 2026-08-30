<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - CV Tri Putra Padma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 font-sans antialiased flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl border border-slate-800">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-600 text-white text-xl font-bold mb-3 shadow-lg shadow-blue-600/30">
                <i class="fa-solid fa-helmet-safety"></i>
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Admin Login</h2>
            <p class="text-sm text-slate-500 mt-1">CV Tri Putra Padma</p>
        </div>

        @if($errors->any())
            <div class="mb-4 bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-3 rounded-r-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required autofocus>
            </div>

            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-xl shadow-lg shadow-blue-600/30 transition">
                Masuk Dashboard
            </button>
        </form>
    </div>
</body>
</html>