@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 flex items-center gap-2">
        📩 Detail Pesan
    </h1>

    <!-- Info Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm text-gray-500">Nama</p>
            <p class="text-lg font-semibold text-gray-800">{{ $message->name }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="text-lg font-semibold text-gray-800">{{ $message->email }}</p>
        </div>
    </div>

    <!-- Pesan -->
    <div class="mt-6">
        <p class="text-sm text-gray-500">Pesan</p>
        <div class="mt-2 p-4 bg-gray-50 border rounded-lg text-gray-700 leading-relaxed">
            {{ $message->message }}
        </div>
    </div>

    <!-- Waktu -->
    <div class="mt-6">
        <p class="text-sm text-gray-500">Dikirim pada</p>
        <p class="text-lg font-medium text-gray-800">
            {{ $message->created_at->format('d M Y H:i') }}
        </p>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8 flex gap-3">
        <a href="{{ route('admin.messages.index') }}"
           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition flex items-center gap-2">
            ⬅️ <span>Kembali</span>
        </a>

        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2">
                🗑 <span>Hapus</span>
            </button>
        </form>
    </div>
</div>
@endsection
