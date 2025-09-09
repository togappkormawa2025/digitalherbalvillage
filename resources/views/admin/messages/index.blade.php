@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="space-y-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">📩 Pesan Masuk</h1>

    @if(session('success'))
        <div class="p-4 mb-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel untuk desktop/tablet -->
    <div class="hidden sm:block overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full border-collapse">
            <thead class="bg-indigo-50 text-indigo-700 text-sm uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Pesan</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                @forelse($messages as $msg)
                    <tr class="transition {{ is_null($msg->read_at) ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}">
                        <td class="px-4 py-3">{{ $msg->name }}</td>
                        <td class="px-4 py-3">{{ $msg->email }}</td>
                        <td class="px-4 py-3">{{ Str::limit($msg->message, 30) }}</td>
                        <td class="px-4 py-3">{{ $msg->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.messages.show', $msg->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                    Lihat
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Kartu untuk mobile -->
    <div class="sm:hidden space-y-4">
        @forelse($messages as $msg)
            <div class="bg-white rounded-lg shadow p-4 space-y-2 {{ is_null($msg->read_at) ? 'bg-gray-100 font-semibold' : '' }}">
                <div class="flex flex-col space-y-1">
                    <p class="text-gray-800 font-medium">{{ $msg->name }}</p>
                    <p class="text-gray-500 text-sm">{{ $msg->email }}</p>
                    <p class="text-gray-400 text-sm">{{ $msg->created_at->format('d M Y') }}</p>
                </div>
                <div class="text-gray-700">
                    {{ Str::limit($msg->message, 150) }}
                </div>
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('admin.messages.show', $msg->id) }}"
                       class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Lihat
                    </a>
                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center mt-6">Belum ada pesan masuk.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $messages->links() }}
    </div>
</div>
@endsection
