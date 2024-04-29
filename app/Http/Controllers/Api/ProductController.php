<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // filter product by name
        $name = $request->input('name');

        // filter product by price from to
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        // Ambil semua produk dengan atau tanpa pencarian berdasarkan nama
        $product = Product::with(['galleries', 'category'])
            ->select('id', 'name', 'price', 'stock', 'category_id');


        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }

        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }


        // Lakukan pagination dan kembalikan respons JSON dengan data produk
        $products = $product->paginate(10);

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get products success',
            'data' => $products
        ]);
    }

    public function show($id)
    {
        // Ambil data produk berdasarkan ID dengan informasi lengkap dan muat galeri terkait
        $product = Product::with(['galleries', 'category'])->findOrFail($id);

        // Kembalikan data dalam format JSON
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get product success',
            'data' => $product
        ]);
    }
}
