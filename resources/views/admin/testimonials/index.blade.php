@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Kelola Testimoni Klien</h2>
        <a href="{{ route('testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md transition">
            + Tambah Testimoni
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-xs font-bold text-slate-500 uppercase">
                    <th class="p-4">Nama Klien</th>
                    <th class="p-4">Asal Instansi</th>
                    <th class="p-4">Review</th>
                    <th class="p-4 text-center">Rating</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 text-sm">
                @foreach($testimonials as $testi)
                <tr>
                    <td class="p-4 font-bold text-slate-900">{{ $testi->client_name }}</td>
                    <td class="p-4 text-slate-600 text-xs">{{ $testi->company_origin }}</td>
                    <td class="p-4 text-slate-500 text-xs italic">"{{ $testi->review }}"</td>
                    <td class="p-4 text-center text-amber-500 font-bold">{{ $testi->rating }} ★</td>
                    <td class="p-4 text-center flex items-center justify-center gap-3">
                        <a href="{{ route('testimonials.edit', $testi->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-xs">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testi->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
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