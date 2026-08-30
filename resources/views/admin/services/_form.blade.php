<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Layanan</label>
    <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Deskripsi</label>
    <textarea name="description" rows="4" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700" required>{{ old('description', $service->description ?? '') }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-slate-700 text-sm font-semibold mb-2">Icon (FontAwesome)</label>
        <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}" placeholder="fa-solid fa-code" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
    </div>
    <div>
        <label class="block text-slate-700 text-sm font-semibold mb-2">Nomor Urut</label>
        <input type="number" name="order" value="{{ old('order', $service->order ?? 0) }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
    </div>
</div>