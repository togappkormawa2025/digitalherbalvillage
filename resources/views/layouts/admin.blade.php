<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed md:static inset-y-0 left-0 w-64 bg-white border-r border-gray-200 flex flex-col shadow-sm transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
        <!-- Logo / Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600 tracking-tight">Admin Panel</h1>
            <!-- Close button (mobile only) -->
            <button onclick="toggleSidebar()" class="md:hidden text-gray-500 hover:text-red-500">
                ✖
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 overflow-y-auto">
            <ul class="space-y-1 text-sm font-medium">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200
                              {{ Route::is('admin.dashboard') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        Dashboard
                    </a>
                </li>

                <!-- Profile -->
                <li>
                    <a href="{{ route('admin.profile') }}"
                       class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200
                              {{ Route::is('admin.profile') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        Profile
                    </a>
                </li>

                <!-- TOGA -->
                <li>
                    <button onclick="toggleMenu('toga-menu','toga-arrow')"
                            class="flex items-center justify-between w-full px-4 py-2 rounded-lg transition-all duration-200 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                        <span>TOGA</span>
                        <svg id="toga-arrow" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <!-- Submenu -->
                    <ul id="toga-menu" class="ml-6 mt-1 space-y-1 hidden">
                        <li>
                            <a href="{{ route('admin.toga.index') }}"
                               class="block px-3 py-2 rounded-md text-sm transition-all duration-200
                                      {{ request()->routeIs('admin.toga.*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                                Tanaman TOGA
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}"
                               class="block px-3 py-2 rounded-md text-sm transition-all duration-200
                                      {{ request()->routeIs('admin.products.*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                                Produk TOGA
                            </a>
                        </li>
                        <li>
                            <a href="#penanaman-toga"
                               class="block px-3 py-2 rounded-md text-sm transition-all duration-200 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600">
                                Penanaman TOGA
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Berita -->
                <li>
                    <a href="{{ route('admin.news.index') }}"
                       class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200
                              {{ request()->routeIs('admin.news.*') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        Berita
                    </a>
                </li>

                <!-- Pesan -->
                <li class="relative">
                    <a href="{{ route('admin.messages.index') }}"
                       class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-200
                              {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        Pesan
                        @if(!empty($unreadCount) && $unreadCount > 0)
                            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-pulse">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Profile bottom -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 text-white flex items-center justify-center rounded-full font-bold">
                    {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-medium text-gray-700 text-sm">{{ Auth::guard('admin')->user()->name }}</p>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-xs text-gray-500 hover:text-red-500 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="flex justify-between items-center mb-6 border-b pb-3 bg-white px-4 py-3 shadow md:rounded-md">
            <div class="flex items-center gap-3">
                <!-- Hamburger (mobile only) -->
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-indigo-600">
                    ☰
                </button>
                <h1 class="text-xl font-semibold text-gray-800">@yield('title')</h1>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="animate-fadeIn">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleMenu(menuId, arrowId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-90');
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>
</html>
