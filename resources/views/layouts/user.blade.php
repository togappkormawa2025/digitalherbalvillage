<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Herbal Village')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        body {
            background: linear-gradient(to bottom, #ccefff, #f0f9ff);
            background-image: url('https://www.transparenttextures.com/patterns/clouds.png');
            background-repeat: repeat;
            background-size: cover;
        }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

<!-- Navbar -->
<nav id="navbar" class="bg-white shadow-md fixed top-0 left-0 w-full z-50 transition duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-[#006400] tracking-tight">
                Herbal<span class="text-gray-800">Village</span>
            </a>

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center space-x-8 font-medium">
                <a href="#beranda" class="relative group hover:text-[#006400] transition">Beranda
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[#006400] group-hover:w-full transition-all"></span>
                </a>
                <a href="#tentang" class="relative group hover:text-[#006400] transition">Tentang
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[#006400] group-hover:w-full transition-all"></span>
                </a>

                <!-- Dropdown Toga -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 hover:text-[#006400] transition font-medium">
                        <span>Toga</span>
                        <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity">
                        <a href="#toga" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Tanaman TOGA</a>
                        <a href="#produk" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Produk TOGA</a>
                        <a href="#penanaman" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Penanaman TOGA</a>
                    </div>
                </div>

                <a href="#berita" class="relative group hover:text-[#006400] transition">Berita
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[#006400] group-hover:w-full transition-all"></span>
                </a>
                <a href="#kontak" class="relative group hover:text-[#006400] transition">Kontak
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[#006400] group-hover:w-full transition-all"></span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-700 text-2xl focus:outline-none">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="menu" class="md:hidden hidden px-4 pb-4 space-y-3 bg-white shadow-lg border-t">
        <a href="#beranda" class="block hover:text-[#006400]">Beranda</a>
        <a href="#tentang" class="block hover:text-[#006400]">Tentang</a>

        <!-- Mobile Dropdown Toga -->
        <div class="block">
            <button id="toga-btn" class="w-full flex justify-between items-center px-2 py-2 text-gray-700 hover:text-[#006400] font-medium focus:outline-none">
                Toga
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div id="toga-menu" class="hidden pl-4 mt-1 space-y-1">
                <a href="#jahe" class="block px-2 py-1 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded transition">Jahe</a>
                <a href="#kunyit" class="block px-2 py-1 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded transition">Kunyit</a>
                <a href="#temulawak" class="block px-2 py-1 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded transition">Temulawak</a>
            </div>
        </div>

        <a href="#berita" class="block hover:text-[#006400]">Berita</a>
        <a href="#kontak" class="block hover:text-[#006400]">Kontak</a>
    </div>
</nav>

<!-- Main Content -->
<main class="max-w-7xl mx-auto p-6 pt-28">
    @yield('content')
</main>

<script>
    // Toggle mobile menu
    document.getElementById('menu-btn').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
    });

    // Toggle mobile dropdown Toga
    document.getElementById('toga-btn').addEventListener('click', function () {
        document.getElementById('toga-menu').classList.toggle('hidden');
    });

    // Navbar transparan dan blur saat scroll
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("bg-white/70", "backdrop-blur-md", "shadow-sm");
            navbar.classList.remove("bg-white", "shadow-md");
        } else {
            navbar.classList.add("bg-white", "shadow-md");
            navbar.classList.remove("bg-white/70", "backdrop-blur-md", "shadow-sm");
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
