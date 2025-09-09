@extends('layouts.admin')

@section('title', 'Edit Tanaman TOGA')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Tanaman TOGA</h2>

    <div class="bg-white shadow-md rounded-lg p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.toga.update', $toga) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Tanaman -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nama Tanaman <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $toga->name) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Gambar
                    @if(!$toga->image) <span class="text-red-500">*</span> @endif
                </label>
                <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" accept="image/*" @if(!$toga->image) required @endif>

                @if($toga->image)
                    <div class="mt-4">
                        <p class="text-gray-600 mb-2">Preview Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/'.$toga->image) }}" class="w-32 sm:w-48 md:w-56 rounded-lg shadow-md object-cover">
                    </div>
                @endif
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" rows="5" required>{{ old('description', $toga->description) }}</textarea>
            </div>

            <!-- Button Submit -->
            <div class="flex justify-end">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
