<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Judul Proyek</label>
    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Kategori</label>
    <input type="text" name="category" value="{{ old('category', $project->category ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Lokasi</label>
    <input type="text" name="location" value="{{ old('location', $project->location ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600" required>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-slate-700 text-sm font-semibold mb-2">Latitude (Opsional)</label>
        <input type="text" name="latitude" value="{{ old('latitude', $project->latitude ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
    </div>
    <div>
        <label class="block text-slate-700 text-sm font-semibold mb-2">Longitude (Opsional)</label>
        <input type="text" name="longitude" value="{{ old('longitude', $project->longitude ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
    </div>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Lingkup Pekerjaan (Scope)</label>
    <textarea name="scope" rows="3" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700" required>{{ old('scope', $project->scope ?? '') }}</textarea>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">URL Gambar (Opsional)</label>
    <input type="text" name="image" value="{{ old('image', $project->image ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
</div>

<div class="flex items-center pt-2">
    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
    <label for="is_featured" class="ml-2 text-slate-700 text-sm font-semibold">Tampilkan sebagai Proyek Unggulan (Featured)</label>
</div>