@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Tambah Testimoni Baru</h2>
        <a href="{{ route('testimonials.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">← Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Nama Klien</label>
                <input type="text" name="client_name" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Asal Instansi / Perusahaan</label>
                <input type="text" name="company_origin" placeholder="Contoh: PT Maju Jaya" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Ulasan (Review)</label>
                <textarea name="review" rows="3" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Rating (1 - 5)</label>
                <select name="rating" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 bg-white">
                    <option value="5">5 Bintang (Sangat Baik)</option>
                    <option value="4">4 Bintang (Baik)</option>
                    <option value="3">3 Bintang (Cukup)</option>
                    <option value="2">2 Bintang (Kurang)</option>
                    <option value="1">1 Bintang (Sangat Kurang)</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl shadow-md transition">
                Simpan Testimoni
            </button>
        </form>
    </div>
</div>
@endsection