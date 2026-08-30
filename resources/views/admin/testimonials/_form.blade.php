<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Klien</label>
    <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700" required>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Perusahaan Asal</label>
    <input type="text" name="company_origin" value="{{ old('company_origin', $testimonial->company_origin ?? '') }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700">
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Rating (1 - 5)</label>
    <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700" required>
</div>

<div>
    <label class="block text-slate-700 text-sm font-semibold mb-2">Ulasan / Review</label>
    <textarea name="review" rows="4" class="w-full border border-slate-300 rounded-xl py-2.5 px-4 text-slate-700" required>{{ old('review', $testimonial->review ?? '') }}</textarea>
</div>