@extends('layouts.user')

@section('title', 'Beranda')

@section('content')
   <!-- Hero Section -->
<section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-20">
    <!-- Text -->
    <div class="space-y-6">
    <h1 class="text-4xl md:text-5xl font-extrabold text-[#006400] leading-tight">
        Selamat Datang di
        <span class="text-[#006400]">Digital Herbal Village</span>
    </h1>

    <p class="text-lg text-gray-600 max-w-lg">
        Temukan informasi seputar tanaman herbal, produk olahan, dan tips kesehatan alami
        dengan tampilan digital yang bersih, modern, dan mudah dipahami.
    </p>

    <a href="#tentang"
       class="inline-block px-8 py-3 bg-[#006400] text-white font-semibold rounded-lg shadow-lg
              hover:bg-[#01351A] transition transform hover:scale-105">
        Mulai Jelajah
    </a>
</div>


    <!-- Image Card -->
    <div class="flex justify-center">
        <div class="w-full max-w-md rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition">
<img src="{{ asset('public/images/toga.png') }}" 
     alt="Ilustrasi informasi" 
     class="w-full h-[500px] object-cover">
        </div>
    </div>
</section>


<!-- Tentang Kami -->
<section id="tentang" class="py-20 bg-gray-50 relative">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Judul -->
        <h2 class="text-4xl font-extrabold text-[#006400] mb-6 relative inline-block">
            Tentang Kami
            <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#006400] rounded-full"></span>
        </h2>
        <p class="text-gray-600 text-lg leading-relaxed max-w-3xl mx-auto">
            Digital Herbal Village adalah platform informasi yang hadir untuk memperkenalkan
            khasiat herbal tradisional, menyediakan tips kesehatan alami, dan membagikan
            pengetahuan seputar tanaman obat secara mudah diakses oleh semua kalangan.
        </p>
    </div>

    <!-- Cards Informasi -->
    <div class="mt-14 grid grid-cols-1 md:grid-cols-3 gap-8 px-6 max-w-6xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 p-8 text-center">
            <h3 class="text-xl font-semibold text-[#006400] mb-3">Informasi Herbal</h3>
            <p class="text-gray-600 text-sm">
                Kami menyediakan informasi lengkap tentang berbagai tanaman herbal dan khasiatnya.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 p-8 text-center">
            <h3 class="text-xl font-semibold text-[#006400] mb-3">Tips Kesehatan Alami</h3>
            <p class="text-gray-600 text-sm">
                Temukan panduan dan tips praktis untuk menjaga kesehatan secara alami.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 p-8 text-center">
            <h3 class="text-xl font-semibold text-[#006400] mb-3">Komunitas & Edukasi</h3>
            <p class="text-gray-600 text-sm">
                Bergabung dengan komunitas dan belajar tentang pemanfaatan herbal secara aman dan efektif.
            </p>
        </div>
    </div>
</section>

<!-- 🌿 Tanaman Obat Keluarga -->
<section id="toga" class="py-20 bg-gradient-to-b from-green-50 to-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Judul -->
        <h2 class="text-4xl md:text-5xl font-extrabold text-[#006400] mb-12 relative inline-block">
            Tanaman Obat Keluarga
            <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-28 h-1 bg-[#006400] rounded-full"></span>
        </h2>

        <!-- Grid TOGA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($plants as $plant)
            <div class="cursor-pointer bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 hover:shadow-2xl transition duration-300">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ $plant->image ? asset('storage/'.$plant->image) : 'https://via.placeholder.com/400x250' }}"
                         alt="{{ $plant->name }}"
                         loading="lazy"
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    <!-- Overlay gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-5 text-center">
                    <h3 class="font-semibold text-lg text-[#006400]">{{ $plant->name }}</h3>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Tombol Lihat Lebih Banyak -->
        <div class="mt-12">
            <button onclick="showModal()"
                    class="px-8 py-3 bg-[#006400] text-white text-lg font-semibold rounded-full shadow-lg hover:bg-green-700 hover:shadow-xl transition">
                🌱 Lihat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<!-- Modal Full TOGA dengan Search -->
<div id="togaModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-start justify-center overflow-auto pt-20 pb-10 backdrop-blur-sm"
     role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8 max-w-5xl w-full relative animate-fadeIn">
        <!-- Tombol Close -->
        <button id="closeModalBtn"
                class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-xl font-bold"
                aria-label="Tutup modal">✖</button>

        <!-- Judul -->
        <h2 class="text-2xl md:text-3xl font-bold text-[#006400] mb-6">Daftar Tanaman Obat Keluarga</h2>

        <!-- Search Bar -->
        <input type="text" id="searchPlant" placeholder="🔍 Cari tanaman..."
               class="w-full mb-8 px-5 py-3 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-[#006400] focus:border-[#006400] transition">

        <!-- Grid Tanaman -->
        <div id="plantsList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($allPlants as $plant)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl overflow-hidden transform hover:-translate-y-1 transition duration-300 plant-card">
                <div class="h-40 overflow-hidden">
                    <img src="{{ $plant->image ? asset('storage/'.$plant->image) : 'https://via.placeholder.com/300x200' }}"
                         alt="{{ $plant->name }}"
                         class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                <div class="p-4 text-left">
                    <h3 class="text-lg font-semibold text-[#006400]">{{ $plant->name }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ Str::limit($plant->description, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Animasi -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.3s ease-out;
}
</style>


<!-- Produk Olahan -->
<section id="produk" class="py-16 bg-green-50">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-green-900 mb-12 text-center">Produk Olahan</h2>

        <!-- Kontainer card 3 produk -->
        <div class="flex flex-col md:flex-row justify-center gap-6">
            @foreach($products->take(3) as $product)
                <div class="w-full md:w-64 bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                         loading="lazy" class="w-full h-40 object-cover">

                    <div class="p-4 flex flex-col justify-between h-full">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $product->description }}</p>
                        </div>

                        <div class="mt-3">
                            <p class="text-green-700 font-bold text-lg">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            @if($product->shopee_link)
                                <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener noreferrer"
                                   class="mt-2 block w-full text-center bg-green-700 hover:bg-green-800 text-white text-sm px-4 py-2 rounded-lg shadow transition">
                                    Beli 🛒
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Lihat Semua Produk -->
        <div class="mt-8 text-center">
            <a href="{{ route('produk.all') }}"
               class="inline-block px-6 py-3 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-full shadow transition">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>





<!-- Cara Penanaman Tanaman Obat Keluarga -->
<section id="penanaman" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-10">
            Cara Penanaman Tanaman Obat Keluarga
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-left">
            <!-- Step 1 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    1
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Pemilihan Lokasi</h3>
                <p class="text-gray-600 text-sm">
                    Pilih lokasi yang mendapatkan sinar matahari cukup, memiliki drainase baik, dan terlindung dari angin kencang.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    2
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Persiapan Media Tanam</h3>
                <p class="text-gray-600 text-sm">
                    Siapkan tanah gembur yang dicampur kompos atau pupuk organik. Pastikan pH tanah sekitar 6–7.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    3
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Pemilihan Bibit</h3>
                <p class="text-gray-600 text-sm">
                    Pilih bibit sehat dari tanaman induk bebas penyakit, rimpang/biji berkualitas, dan sesuai jenis TOGA yang ingin ditanam.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    4
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Penanaman</h3>
                <p class="text-gray-600 text-sm">
                    Tanam bibit/rimpang pada jarak yang sesuai tiap jenis tanaman. Contohnya: 30–50 cm untuk jahe dan kunyit.
                </p>
            </div>

            <!-- Step 5 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    5
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Penyiraman</h3>
                <p class="text-gray-600 text-sm">
                    Siram secara rutin sesuai kebutuhan tanaman. Pastikan tanah lembap tapi tidak tergenang.
                </p>
            </div>

            <!-- Step 6 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    6
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Pemupukan</h3>
                <p class="text-gray-600 text-sm">
                    Berikan pupuk organik atau kompos setiap 2–3 minggu untuk mendukung pertumbuhan daun dan rimpang.
                </p>
            </div>

            <!-- Step 7 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    7
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Penyiangan & Perawatan</h3>
                <p class="text-gray-600 text-sm">
                    Bersihkan gulma, lakukan pemangkasan jika perlu, dan awasi pertumbuhan tanaman agar tidak terganggu hama.
                </p>
            </div>

            <!-- Step 8 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    8
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Pengendalian Hama & Penyakit</h3>
                <p class="text-gray-600 text-sm">
                    Gunakan pestisida nabati atau metode alami. Pantau secara berkala untuk mencegah serangan hama dan penyakit.
                </p>
            </div>

            <!-- Step 9 -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white font-bold text-lg mb-4">
                    9
                </div>
                <h3 class="font-semibold text-lg mb-2 text-gray-800">Panen</h3>
                <p class="text-gray-600 text-sm">
                    Panen sesuai jenis tanaman dan umur tanam. Misalnya jahe atau kunyit bisa dipanen setelah 8–10 bulan.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Berita -->
<section id="berita" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">
            Berita Terbaru
        </h2>

        <!-- Grid Berita -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($news as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/600/400?random=' . $item->id }}"
                             class="w-full h-48 object-cover"
                             alt="{{ $item->title }}">
                        <span class="absolute top-3 left-3 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $item->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}
                        </p>
                        <a href="{{ route('berita.show', $item->id) }}"
                           class="inline-block text-green-600 font-medium hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div> <!-- end grid -->
    </div>
</section>



<!-- Kontak / Kirim Pesan Elegan -->
<section id="kontak" class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">
            Hubungi Kami
        </h2>
        <p class="text-gray-600 mb-10 text-center">
            Isi formulir di bawah ini untuk mengirim pesan atau pertanyaan kepada kami.
        </p>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
            <!-- Foto / Ilustrasi -->
            <div class="md:w-1/2">
<img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80"
     alt="Ilustrasi Kontak"
     class="w-full h-full object-cover">

            </div>

            <!-- Formulir -->
            <div class="md:w-1/2 p-8 md:p-12">
                <!-- Kontak / Kirim Pesan Elegan -->
<!-- Kontak / Kirim Pesan Elegan -->
<form action="{{ route('pesan.store') }}" method="POST" class="space-y-5">
    @csrf
    <div>
        <label for="name" class="block text-gray-700 font-medium mb-1">Nama</label>
        <input type="text" id="name" name="name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none text-gray-800">
    </div>

    <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none text-gray-800">
    </div>

    <div>
        <label for="message" class="block text-gray-700 font-medium mb-1">Pesan</label>
        <textarea id="message" name="message" rows="4" required
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none text-gray-800"></textarea>
    </div>

    <div>
        <button type="submit"
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-green-700 transition">
            Kirim Pesan
        </button>
    </div>
</form>

            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-green-800 text-gray-100 pt-16 pb-8 mt-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Tentang -->
        <div>
            <h3 class="text-xl font-semibold text-white mb-4">Tentang Kami</h3>
            <p class="text-gray-200 text-sm leading-relaxed">
                Herbal Village hadir untuk memberikan informasi seputar tanaman obat keluarga
                dan produk olahannya, agar masyarakat dapat lebih mudah mengakses pengetahuan bermanfaat.
            </p>
        </div>

        <!-- Navigasi -->
        <div>
            <h3 class="text-xl font-semibold text-white mb-4">Navigasi</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#tentang" class="hover:text-green-300 transition">Tentang Kami</a></li>
                <li><a href="#toga" class="hover:text-green-300 transition">Tanaman TOGA</a></li>
                <li><a href="#produk" class="hover:text-green-300 transition">Produk Olahan</a></li>
                <li><a href="#penanaman" class="hover:text-green-300 transition">Cara Penanaman</a></li>
                <li><a href="#berita" class="hover:text-green-300 transition">Berita</a></li>
            </ul>
        </div>

        <!-- Kontak & Sosial Media -->
        <div>
            <h3 class="text-xl font-semibold text-white mb-4">Kontak</h3>
            <ul class="space-y-2 text-sm mb-4">
                <li>📞 +62 857-9872-6923</li>
                <li>✉️ togappkormawa2025@gmail.com</li>
            </ul>
<div class="flex space-x-4">
    <!-- TikTok -->
    <a href="https://www.tiktok.com/@ppko.hmbhelianthus2025?_t=ZS-8zZUVXGN3nr&_r=1" class="text-gray-200 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-6 h-6 fill-current">
            <path d="M128 0C57.31 0 0 57.31 0 128c0 70.69 57.31 128 128 128 70.69 0 128-57.31 128-128V88h-40v48c0 44.11-35.89 80-80 80s-80-35.89-80-80 35.89-80 80-80h8V0h-8z"/>
        </svg>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/ppkhelianthus?igsh=MXExYTVmM29pdjN3dQ==" class="text-gray-200 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
            <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2c1.654 0 3 1.346 3 3s-1.346 3-3 3a3 3 0 110-6zm4.5-3a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
        </svg>
    </a>

    <!-- YouTube -->
    <a href="https://www.youtube.com/@PPKOHMB-Helianthus2025" class="text-gray-200 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
            <path d="M21.8 8.001a2.749 2.749 0 00-1.937-1.947C18.27 6 12 6 12 6s-6.27 0-7.863.054A2.749 2.749 0 002.2 8.001C2 9.594 2 12.001 2 12.001s0 2.407.2 4a2.749 2.749 0 001.937 1.947C5.73 18.002 12 18.002 12 18.002s6.27 0 7.863-.054a2.749 2.749 0 001.937-1.947c.2-1.593.2-4 .2-4s0-2.407-.2-3.999zM10 15.002v-6l5.2 3-5.2 3z"/>
        </svg>
    </a>
</div>


        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-green-700 mt-10 pt-6 text-center text-sm text-gray-300">
        © 2025 Herbal Village. Semua Hak Dilindungi.
    </div>
</footer>



<!-- Swiper & Modal Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
// === Scroll Produk Olahan ===
const container = document.getElementById('produkContainer');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

const scrollAmount = 300; // Jumlah scroll tiap klik

if (nextBtn && prevBtn && container) {
    nextBtn.addEventListener('click', () => {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
}

// === Modal Produk Olahan ===
function openModal(id) {
    document.getElementById(`modal-${id}`).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(`modal-${id}`).classList.add('hidden');
}

// Tutup modal jika klik area luar konten (Produk Olahan)
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('modal-overlay')) {
        e.target.classList.add('hidden');
    }
});

// === Modal TOGA ===
function showModal() {
    document.getElementById('togaModal').classList.remove('hidden');
}

function closeTogaModal() {
    document.getElementById('togaModal').classList.add('hidden');
}

// Tombol close modal TOGA
const togaCloseBtn = document.getElementById('closeModalBtn');
if (togaCloseBtn) {
    togaCloseBtn.addEventListener('click', closeTogaModal);
}

// Tutup modal TOGA jika klik overlay
const togaModal = document.getElementById('togaModal');
if (togaModal) {
    togaModal.addEventListener('click', function(e) {
        if (e.target === this) closeTogaModal();
    });
}

// === Filter Tanaman ===
const searchInput = document.getElementById('searchPlant');
if (searchInput) {
    searchInput.addEventListener('input', function(){
        const keyword = this.value.toLowerCase();
        const cards = document.querySelectorAll('#plantsList .plant-card');
        cards.forEach(card => {
            // Gunakan data-name jika ada, kalau tidak fallback ke h3
            const name = card.dataset.name ? card.dataset.name.toLowerCase() :
                         card.querySelector('h3')?.textContent.toLowerCase() || '';
            card.style.display = name.includes(keyword) ? 'block' : 'none';
        });
    });
}

</script>

@endsection
