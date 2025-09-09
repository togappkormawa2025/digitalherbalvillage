@extends('layouts.admin')

@section('title', 'Daftar Berita')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
    <h2 class="text-2xl font-bold text-gray-800">📰 Daftar Berita</h2>
    <a href="{{ route('admin.news.create') }}"
       class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition duration-200">
        + Tambah Berita
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
@endif

<!-- Responsive Table -->
<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border-collapse">
        <thead class="bg-indigo-50 text-indigo-700 text-sm uppercase">
            <tr>
                <th class="px-4 py-3 text-left">Judul</th>
                <th class="px-4 py-3 text-left">Gambar</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
            @forelse($news as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-medium">{{ $item->title }}</td>
                    <td class="px-4 py-3">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-16 object-cover rounded-md border shadow-sm">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.news.edit', $item->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item->id) }}" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                        Belum ada berita.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $news->links() }}
</div>
@endsection
