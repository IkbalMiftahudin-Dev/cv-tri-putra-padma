@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Testimoni</h2>
    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        @include('admin.testimonials._form')
        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-xl shadow-lg transition">Perbarui Testimoni</button>
            <a href="{{ route('testimonials.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Batal</a>
        </div>
    </form>
</div>
@endsection