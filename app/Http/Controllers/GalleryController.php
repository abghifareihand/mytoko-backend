<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        // Mendapatkan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Mengambil galeri yang terkait dengan produk
        $gallery = $product->galleries;

        // Mengirimkan data produk dan galeri ke tampilan menggunakan compact()
        return view('pages.gallery.index', compact('gallery', 'product'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $product = Product::findOrFail($id);
        return view('pages.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $files = $request->file('files');

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $path = $file->store('gallery', 'public');

                // Dapatkan URL dari file yang disimpan
                $url = url('') . Storage::url($path);

                Gallery::create([
                    'product_id' => $product->id,
                    'image_url' => $url
                ]);
            }
        }
        return redirect()->route('product.gallery.index', $product->id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
