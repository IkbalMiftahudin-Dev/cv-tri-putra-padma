@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Edit Layanan</h2>
        <a href="{{ route('services.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">← Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Nama Layanan</label>
                <input type="text" name="name" value="{{ $service->name }}" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Deskripsi</label>
                <textarea name="description" rows="3" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">{{ $service->description }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Ikon (Emoji)</label>
                <input type="text" name="icon" value="{{ $service->icon }}" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Urutan (Order)</label>
                <input type="number" name="order" value="{{ $service->order }}" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl shadow-md transition">
                Perbarui Layanan
            </button>
        </form>
    </div>
</div>
@endsection