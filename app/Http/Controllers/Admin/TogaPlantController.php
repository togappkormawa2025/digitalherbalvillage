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
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('toga'), $imageName);
            $data['image'] = 'toga/'.$imageName;
        }

        TogaPlant::create($data);

        return redirect()->route('admin.toga.index')->with('success', 'Tanaman berhasil ditambahkan!');
    }

    public function edit(TogaPlant $toga)
    {
        return view('admin.toga.edit', compact('toga'));
    }

    public function update(Request $request, TogaPlant $toga)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // hapus gambar lama kalau ada
            if ($toga->image && file_exists(public_path($toga->image))) {
                unlink(public_path($toga->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('toga'), $imageName);
            $data['image'] = 'toga/'.$imageName;
        }

        $toga->update($data);

        return redirect()->route('admin.toga.index')->with('success', 'Tanaman berhasil diperbarui!');
    }

    public function destroy(TogaPlant $toga)
    {
        if ($toga->image && file_exists(public_path($toga->image))) {
            unlink(public_path($toga->image));
        }
        $toga->delete();

        return redirect()->route('admin.toga.index')->with('success', 'Tanaman berhasil dihapus!');
    }
}
