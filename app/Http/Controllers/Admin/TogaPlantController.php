<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TogaPlant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name'        => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
        ]);

        // Simpan gambar ke storage
        $validated['image'] = $request->file('image')->store('toga', 'public');

        TogaPlant::create($validated);

        return redirect()->route('admin.toga.index')
            ->with('success', 'Tanaman TOGA berhasil ditambahkan');
    }

    public function edit(TogaPlant $toga)
    {
        return view('admin.toga.edit', compact('toga'));
    }

    public function update(Request $request, TogaPlant $toga)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
        ]);

        // Jika ada gambar baru, hapus lama lalu simpan baru
        if ($request->hasFile('image')) {
            if ($toga->image && Storage::disk('public')->exists($toga->image)) {
                Storage::disk('public')->delete($toga->image);
            }

            $validated['image'] = $request->file('image')->store('toga', 'public');
        }

        $toga->update($validated);

        return redirect()->route('admin.toga.index')
            ->with('success', 'Tanaman TOGA berhasil diperbarui');
    }

    public function destroy(TogaPlant $toga)
    {
        // Hapus gambar dari storage kalau ada
        if ($toga->image && Storage::disk('public')->exists($toga->image)) {
            Storage::disk('public')->delete($toga->image);
        }

        $toga->delete();

        return redirect()->route('admin.toga.index')
            ->with('success', 'Tanaman TOGA berhasil dihapus');
    }
}
