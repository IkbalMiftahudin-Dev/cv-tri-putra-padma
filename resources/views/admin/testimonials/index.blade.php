@extends('admin.layouts.app')

@section('content')
<!-- Custom Styling untuk menyelaraskan komponen DataTables dengan Tailwind -->
<style>
    .dataTables_wrapper .dataTables_length select {
        padding: 0.35rem 2rem 0.35rem 0.75rem;
        font-size: 0.875rem;
        border: 1px solid #cbd5e1;
        border-radius: 0.75rem;
        background-color: #ffffff;
        color: #334155;
        outline: none;
    }
    .dataTables_wrapper .dataTables_filter input {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border: 1px solid #cbd5e1;
        border-radius: 0.75rem;
        background-color: #ffffff;
        color: #334155;
        outline: none;
        margin-left: 0.5rem;
    }
    .dataTables_wrapper .dataTables_filter input:focus,
    .dataTables_wrapper .dataTables_length select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }
    .dataTables_wrapper .dataTables_info {
        font-size: 0.875rem;
        color: #64748b;
        padding-top: 1rem;
    }
    .dataTables_wrapper .dataTables_paginate {
        padding-top: 1rem;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.4rem 0.8rem;
        margin: 0.2rem;
        font-size: 0.875rem;
        border: 1px solid #cbd5e1;
        border-radius: 0.5rem;
        background: #ffffff !important;
        color: #334155 !important;
        cursor: pointer;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #2563eb !important;
        border-color: #2563eb !important;
        color: #ffffff !important;
        font-weight: 600;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f1f5f9 !important;
        border-color: #94a3b8 !important;
        color: #0f172a !important;
    }
    .dataTables_wrapper .flex-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }
</style>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Manajemen Testimoni</h2>
        <p class="text-sm text-slate-500">Ulasan klien perusahaan.</p>
    </div>
    <a href="{{ route('testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2.5 rounded-xl shadow-lg shadow-blue-600/25 transition flex items-center">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Testimoni
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 overflow-hidden">
    <table id="testimonialsTable" class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700">
        <thead class="bg-slate-50 text-slate-500 text-xs font-semibold uppercase tracking-wider">
            <tr>
                <th class="py-4 px-6">Nama Klien</th>
                <th class="py-4 px-6">Perusahaan Asal</th>
                <th class="py-4 px-6">Rating</th>
                <th class="py-4 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            @forelse($testimonials as $item)
            <tr class="hover:bg-slate-50 transition">
                <td class="py-4 px-6 font-medium text-slate-900">{{ $item->client_name }}</td>
                <td class="py-4 px-6 text-slate-600">{{ $item->company_origin ?? '-' }}</td>
                <td class="py-4 px-6 text-amber-500 font-bold">@for($i = 0; $i < $item->rating; $i++) ★ @endfor</td>
                <td class="py-4 px-6 text-center space-x-2 flex justify-center items-center">
                    <a href="{{ route('testimonials.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Edit</a>
                    <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>

<!-- Script Inisialisasi DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#testimonialsTable').DataTable({
            dom: '<"flex-header"lf>rt<"flex justify-between items-center flex-wrap gap-4"ip>',
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data tersedia",
                infoFiltered: "(disaring dari _MAX_ total data)",
                zeroRecords: "Tidak ditemukan data yang cocok",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            columnDefs: [
                { orderable: false, targets: 3 } // Menonaktifkan sorting untuk kolom Aksi
            ]
        });
    });
</script>
@endsection