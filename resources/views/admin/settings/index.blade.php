@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-800">Pengaturan Perusahaan</h2>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <form action="{{ route('settings.update') }}" method="POST" class="space-y-4">
            @csrf
            @foreach($settings as $setting)
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">
                    {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                </label>
                <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            </div>
            @endforeach

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl shadow-md transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection