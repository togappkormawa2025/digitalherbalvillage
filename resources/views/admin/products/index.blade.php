@extends('layouts.admin')

@section('title', 'Daftar Produk TOGA')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
    <h2 class="text-2xl font-bold text-gray-800">🛒 Daftar Produk TOGA</h2>
    <a href="{{ route('admin.products.create') }}"
       class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-200">
        + Tambah Produk
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
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Gambar</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Harga</th>
                <th class="px-4 py-3 text-left">Link</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
            @forelse($products as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 class="w-14 h-14 object-cover rounded-md border">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-medium">{{ $product->name }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        @if($product->link)
                            <a href="{{ $product->link }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                Shopee
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                  onsubmit="return confirm('Hapus produk ini?')">
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
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                        Belum ada produk TOGA.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection
