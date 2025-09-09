<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TogaPlant;
use Illuminate\Http\Request;

class TogaPlantController extends Controller
{
    public function index()
    {
        $plants = TogaPlant::latest()->paginate(10);
        return view('admin.toga.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.toga.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'description' => 'required|string',
    ]);

    // Simpan gambar
    $path = $request->file('image')->store('toga', 'public');

    TogaPlant::create([
        'name' => $validated['name'],
        'image' => $path,
        'description' => $validated['description'],
    ]);

    return redirect()->route('admin.toga.index')->with('success', 'Tanaman TOGA berhasil ditambahkan');
}


    public function edit(TogaPlant $toga)
    {
        return view('admin.toga.edit', compact('toga'));
    }

  public function update(Request $request, TogaPlant $toga)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'description' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('toga', 'public');
        $validated['image'] = $path;
    }

    $toga->update($validated);

    return redirect()->route('admin.toga.index')->with('success', 'Tanaman TOGA berhasil diperbarui');
}


    public function destroy(TogaPlant $toga)
    {
        $toga->delete();
        return redirect()->route('admin.toga.index')->with('success', 'Tanaman berhasil dihapus!');
    }
}
