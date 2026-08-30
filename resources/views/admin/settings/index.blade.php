@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Pengaturan Perusahaan</h2>
        <p class="text-sm text-slate-500">Kelola identitas dan kontak website.</p>
    </div>

    <form action="{{ route('settings.update') }}" method="POST" class="space-y-4">
        @csrf
        @php $settingMap = $settings->pluck('value', 'key'); @endphp

        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Perusahaan</label>
            <input type="text" name="company_name" value="{{ old('company_name', $settingMap['company_name'] ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
        </div>

        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nomor Telepon / WhatsApp</label>
            <input type="text" name="company_phone" value="{{ old('company_phone', $settingMap['company_phone'] ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
        </div>

        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Email Perusahaan</label>
            <input type="email" name="company_email" value="{{ old('company_email', $settingMap['company_email'] ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
        </div>

        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Alamat Kantor</label>
            <textarea name="company_address" rows="3" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">{{ old('company_address', $settingMap['company_address'] ?? '') }}</textarea>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-xl shadow-lg transition">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection