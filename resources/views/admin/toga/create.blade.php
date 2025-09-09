@extends('layouts.admin')

@section('title', 'Tambah Tanaman TOGA')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">🌿 Tambah Tanaman</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.toga.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <!-- Nama -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Nama Tanaman <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                required>
        </div>

        <!-- Gambar -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Gambar <span class="text-red-500">*</span></label>
            <input type="file" name="image" accept="image/*"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
            <textarea name="description" rows="5"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition resize-y"
                required>{{ old('description') }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end">
            <a href="{{ route('admin.toga.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition mr-2">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
