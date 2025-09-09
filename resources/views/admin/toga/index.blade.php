@extends('layouts.admin')

@section('title', 'Daftar Tanaman TOGA')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
    <h2 class="text-2xl font-bold text-gray-800">🌿 Daftar Tanaman TOGA</h2>
    <a href="{{ route('admin.toga.create') }}"
       class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-200">
        + Tambah Tanaman
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
@endif

<!-- Responsive Table -->
<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border-collapse">
        <thead class="bg-indigo-50 text-indigo-700 text-sm uppercase">
            <tr>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Gambar</th>
                <th class="px-4 py-3 text-left">Deskripsi</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
            @forelse($plants as $plant)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-medium">{{ $plant->name }}</td>
<td class="px-4 py-3">
    @if($plant->image)
        <img src="{{ asset($plant->image) }}"
             class="w-14 h-14 object-cover rounded-md border">
    @else
        <span class="text-gray-400">-</span>
    @endif
</td>

                    <td class="px-4 py-3">{{ Str::limit($plant->description, 60) }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.toga.edit', $plant) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.toga.destroy', $plant) }}"
                                  onsubmit="return confirm('Hapus tanaman ini?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                        Belum ada tanaman TOGA.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
{{ $plants->links() }}

</div>
@endsection
