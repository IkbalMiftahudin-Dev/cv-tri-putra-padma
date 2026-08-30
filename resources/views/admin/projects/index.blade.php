@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Kelola Sebaran Proyek</h2>
        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition">
            + Tambah Proyek
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold text-slate-500 uppercase">
                    <th class="p-4">Judul Proyek</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Lokasi</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 text-sm">
                @foreach($projects as $project)
                <tr>
                    <td class="p-4 font-bold text-slate-900">{{ $project->title }}</td>
                    <td class="p-4 text-slate-600">{{ $project->category }}</td>
                    <td class="p-4 text-slate-500 text-xs">{{ $project->location }}</td>
                    <td class="p-4 text-center flex items-center justify-center gap-3">
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-xs">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection