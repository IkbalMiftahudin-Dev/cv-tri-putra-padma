@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Manajemen Testimoni</h2>
        <p class="text-sm text-slate-500">Ulasan klien perusahaan.</p>
    </div>
    <a href="{{ route('testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2.5 rounded-xl shadow-lg transition flex items-center">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Testimoni
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="min-w-full divide-y divide-slate-200 text-left">
        <thead class="bg-slate-50 text-slate-500 text-xs font-semibold uppercase tracking-wider">
            <tr>
                <th class="py-4 px-6">Nama Klien</th>
                <th class="py-4 px-6">Perusahaan Asal</th>
                <th class="py-4 px-6">Rating</th>
                <th class="py-4 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-600 text-sm">
            @forelse($testimonials as $item)
            <tr class="hover:bg-slate-50/50 transition">
                <td class="py-4 px-6 font-medium text-slate-800">{{ $item->client_name }}</td>
                <td class="py-4 px-6">{{ $item->company_origin ?? '-' }}</td>
                <td class="py-4 px-6 text-amber-500 font-bold">@for($i = 0; $i < $item->rating; $i++) ★ @endfor</td>
                <td class="py-4 px-6 text-center space-x-2 flex justify-center items-center">
                    <a href="{{ route('testimonials.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Edit</a>
                    <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="py-8 text-center text-slate-400">Belum ada data testimoni.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection