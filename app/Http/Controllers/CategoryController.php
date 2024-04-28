<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan file gambar
        $path = $request->file('image')->store('category', 'public');

        // Dapatkan URL dari file yang disimpan
        $url = url('') . Storage::url($path);

        // Buat entri baru dalam database
        Category::create([
            'name' => $request->name,
            'image' => $url
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Temukan kategori yang akan diperbarui
        $category = Category::findOrFail($id);

        // Simpan file gambar baru jika ada
        if ($request->hasFile('image')) {
            // Simpan gambar baru
            $path = $request->file('image')->store('category', 'public');
            // Dapatkan URL dari file yang disimpan
            $url = url('') . Storage::url($path);
            $category->update([
                'image' => $url
            ]);
        }

        // Perbarui nama kategori jika ada
        if ($request->has('name')) {
            $category->update([
                'name' => $request->name
            ]);
        }

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category ' . $name . ' deleted successfully.');
    }
}
