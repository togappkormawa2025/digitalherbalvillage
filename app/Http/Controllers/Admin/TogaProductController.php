<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TogaProduct;
use Illuminate\Http\Request;

class TogaProductController extends Controller
{
    public function index()
    {
        $products = TogaProduct::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'shopee_link' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('toga_products', 'public');
        }

        TogaProduct::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk TOGA berhasil ditambahkan');
    }

    public function edit(TogaProduct $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, TogaProduct $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'shopee_link' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('toga_products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk TOGA berhasil diperbarui');
    }

    public function destroy(TogaProduct $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk TOGA berhasil dihapus');
    }
}
