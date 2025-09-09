@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📰 Edit Berita</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>

        <!-- Gambar -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Gambar</label>
            @if($news->image)
                <div class="mb-2">
                    <p class="text-gray-600 text-sm mb-1">Preview Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" class="w-32 rounded-md border shadow-sm">
                </div>
            @endif
            <input type="file" name="image" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>

        <!-- Konten -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Konten</label>
            <textarea name="content" rows="6"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition resize-y">{{ old('content', $news->content) }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end">
            <a href="{{ route('admin.news.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition mr-2">
                Batal
            </a>
            <button type="submit"
                    class="px-5 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow hover:bg-yellow-700 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
