@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total User -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm font-medium text-gray-500">Total Pengguna</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalUsers }}</p>
        </div>

        <!-- Total Berita -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm font-medium text-gray-500">Berita Diposting</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalNews }}</p>
        </div>

        <!-- Total Pesan -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm font-medium text-gray-500">Pesan Masuk</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalMessages }}</p>
        </div>

        <!-- Total Tanaman -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm font-medium text-gray-500">Tanaman TOGA</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalPlants }}</p>
        </div>

        <!-- Total Produk -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm font-medium text-gray-500">Produk TOGA</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalProducts }}</p>
        </div>
    </div>
@endsection
