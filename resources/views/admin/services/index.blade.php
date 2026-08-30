@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Kelola Layanan</h2>
        <a href="{{ route('services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition">
            + Tambah Layanan
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold text-slate-500 uppercase">
                    <th class="p-4">Ikon</th>
                    <th class="p-4">Nama Layanan</th>
                    <th class="p-4">Deskripsi</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 text-sm">
                @foreach($services as $service)
                <tr>
                    <td class="p-4 text-xl">{{ $service->icon }}</td>
                    <td class="p-4 font-bold text-slate-900">{{ $service->name }}</td>
                    <td class="p-4 text-slate-500 text-xs">{{ $service->description }}</td>
                    <td class="p-4 text-center flex items-center justify-center gap-3">
                        <a href="{{ route('services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-xs">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
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