<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TogaPlant;
use App\Models\TogaProduct;
use App\Models\News;
use App\Models\Message;

class HomeController extends Controller
{
    /**
     * Halaman dashboard / beranda
     */
public function index()
{
    $plants = TogaPlant::latest()->take(3)->get();
    $allPlants = TogaPlant::all();
    $products = TogaProduct::latest()->take(3)->get(); // hanya 3 produk
    $news = News::latest()->take(3)->get();

    return view('user.dashboard', compact('plants', 'allPlants', 'products', 'news'));
}

// Tambahkan method untuk halaman semua produk
public function allProducts()
{
    $products = TogaProduct::latest()->get(); // ambil semua produk
    return view('user.products.all', compact('products'));
}



    /**
     * Detail berita
     */
    public function showNews($id)
    {
        $news = News::findOrFail($id);
        return view('user.news.show', compact('news'));
    }

    /**
     * Simpan pesan kontak dari user
     */
    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
