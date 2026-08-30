@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Manajemen Proyek</h2>
        <p class="text-sm text-slate-500">Daftar portofolio pekerjaan perusahaan.</p>
    </div>
    <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2.5 rounded-xl shadow-lg shadow-blue-600/20 transition flex items-center">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Proyek
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="min-w-full divide-y divide-slate-200 text-left">
        <thead class="bg-slate-50 text-slate-500 text-xs font-semibold uppercase tracking-wider">
            <tr>
                <th class="py-4 px-6">Judul Proyek</th>
                <th class="py-4 px-6">Kategori</th>
                <th class="py-4 px-6">Lokasi</th>
                <th class="py-4 px-6 text-center">Featured</th>
                <th class="py-4 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-600 text-sm">
            @forelse($projects as $project)
            <tr class="hover:bg-slate-50/50 transition">
                <td class="py-4 px-6 font-medium text-slate-800">{{ $project->title }}</td>
                <td class="py-4 px-6">{{ $project->category }}</td>
                <td class="py-4 px-6">{{ $project->location }}</td>
                <td class="py-4 px-6 text-center">
                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $project->is_featured ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' }}">
                        {{ $project->is_featured ? 'Ya' : 'Tidak' }}
                    </span>
                </td>
                <td class="py-4 px-6 text-center space-x-2 flex justify-center items-center">
                    <a href="{{ route('projects.edit', $project->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Hapus proyek ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-slate-400">Belum ada data proyek.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection