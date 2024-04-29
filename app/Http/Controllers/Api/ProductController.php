<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori
        $products = Product::with('galleries')->select('id', 'name', 'price', 'stock')->paginate(10);

        // Kembalikan respons JSON dengan data kategori
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
        $product = Product::with('galleries')->findOrFail($id);

        // Kembalikan data dalam format JSON
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get product success',
            'data' => $product
        ]);
    }
}
