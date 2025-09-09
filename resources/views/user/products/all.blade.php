<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Semua Produk - Herbal Village</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

<!-- Header -->
<header class="bg-white shadow p-4">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-green-700">Herbal<span class="text-gray-800">Village</span></a>
        <nav class="space-x-4">
            <a href="/" class="text-gray-700 hover:text-green-700">Beranda</a>
            <a href="#berita" class="text-gray-700 hover:text-green-700">Berita</a>
        </nav>
    </div>
</header>

<main class="max-w-6xl mx-auto p-6 mt-6">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6">
        <a href="/" class="hover:underline">Beranda</a> &gt;
        <span class="text-gray-800 font-medium">Semua Produk</span>
    </div>

    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Semua Produk Herbal Village</h1>

    <!-- Grid Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-xl shadow hover:shadow-xl overflow-hidden transform hover:-translate-y-1 transition cursor-pointer">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full h-48 object-cover">

            <div class="p-4 flex flex-col justify-between h-48">
                <div>
                    <h3 class="font-semibold text-lg mb-1 line-clamp-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-2">{{ $product->description }}</p>
                </div>
                <div class="mt-auto">
                    <p class="text-green-700 font-bold text-lg mb-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    @if($product->shopee_link)
                    <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener noreferrer"
                       class="block text-center bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition">
                        Beli di Shopee 🛒
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal Produk -->
        <div id="modal-{{ $product->id }}" class="modal-overlay hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white rounded-xl max-w-lg w-full p-6 relative">
                <button onclick="closeModal({{ $product->id }})"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">✕</button>

                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="w-full h-60 object-cover rounded-lg mb-4">

                <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $product->name }}</h3>
                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                <p class="text-green-700 font-bold mt-4 text-lg">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                @if($product->shopee_link)
                    <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener noreferrer"
                       class="mt-5 block w-full text-center bg-orange-500 hover:bg-orange-600 text-white text-sm px-5 py-3 rounded-lg transition">
                        Beli di Shopee 🛒
                    </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</main>

<script>
    // Modal
    function openModal(id) {
        document.getElementById(`modal-${id}`).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(`modal-${id}`).classList.add('hidden');
    }
    document.addEventListener('click', function(e){
        if(e.target.classList.contains('modal-overlay')){
            e.target.classList.add('hidden');
        }
    });
</script>

</body>
</html>
