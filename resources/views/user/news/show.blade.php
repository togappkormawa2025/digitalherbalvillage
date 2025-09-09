<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f9fafb;
        }
    </style>
</head>
<body class="text-gray-800">

    <!-- Header -->
    <header class="bg-green-600 text-white py-6 shadow">
        <div class="max-w-5xl mx-auto px-6">
            <h1 class="text-3xl font-bold">Herbal Village</h1>
        </div>
    </header>

    <!-- Konten Berita -->
    <main class="max-w-5xl mx-auto py-16 px-6">
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}" class="inline-block mb-6 text-green-600 hover:underline">
            ← Kembali ke Berita
        </a>

        <!-- Judul & Tanggal -->
        <h1 class="text-4xl font-bold text-gray-800 mb-3">{{ $news->title }}</h1>
        <p class="text-gray-500 text-sm mb-6">{{ $news->created_at->format('d M Y') }}</p>

        <!-- Gambar Utama (kecil dan responsive) -->
        @if($news->image)
            <div class="w-full overflow-hidden rounded-xl mb-6 shadow-md" style="max-height:400px;">
                <img src="{{ asset('storage/' . $news->image) }}"
                     alt="{{ $news->title }}"
                     class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Konten Berita -->
        <div class="prose max-w-none text-gray-700">
            {!! $news->content !!}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-6 mt-16">
        <div class="max-w-5xl mx-auto px-6 text-center text-gray-600">
            &copy; {{ date('Y') }} Herbal Village. All rights reserved.
        </div>
    </footer>

</body>
</html>
