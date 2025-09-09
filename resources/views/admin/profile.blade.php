@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 p-6 flex flex-col items-center text-white">
            <div class="w-20 h-20 bg-white text-indigo-600 flex items-center justify-center rounded-full text-3xl font-bold shadow-lg mb-3">
                {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
            </div>
            <h2 class="text-2xl font-semibold">{{ Auth::guard('admin')->user()->name }}</h2>
            <p class="text-indigo-100">{{ Auth::guard('admin')->user()->email }}</p>
        </div>

        <!-- Forms Section -->
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Update Profile -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Edit Profil</h3>
                <form method="POST" action="#" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" value="{{ Auth::guard('admin')->user()->name }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" value="{{ Auth::guard('admin')->user()->email }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full md:w-auto bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Ganti Password</h3>
                <form method="POST" action="#" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
                        <input type="password" name="current_password"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input type="password" name="new_password"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full md:w-auto bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                            Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
