@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Tambah Proyek Baru</h2>
        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">← Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Judul Proyek</label>
                <input type="text" name="title" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Kategori</label>
                    <input type="text" name="category" placeholder="Contoh: Perpipaan Industri" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Lokasi</label>
                    <input type="text" name="location" placeholder="Contoh: Bandung" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Lingkup Pekerjaan (Scope)</label>
                <textarea name="scope" rows="3" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl shadow-md transition">
                Simpan Proyek
            </button>
        </form>
    </div>
</div>
@endsection