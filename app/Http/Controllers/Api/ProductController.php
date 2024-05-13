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

        // filter product by name
        $limit = $request->input('limit', 10);

        // filter product by price from to
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $product = Product::with(['category', 'galleries' => function ($query) {
            $query->take(1); // Ambil hanya satu galeri untuk setiap produk
        }])->select('id', 'name', 'price', 'stock', 'category_id');


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
        // $products = $product->get();
        $products = $product->paginate($limit);

        foreach ($products as $product) {
            // Hitung total favorit untuk produk ini
            $product->total_favorite = $product->favorites->count();

            // Periksa apakah user sedang login memiliki produk ini dalam favoritnya
            $product->is_favorite = $product->favorites->contains('user_id', $request->user()->id);
        }

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
        $product = Product::with(['galleries', 'category', 'reviews.user'])->find($id);

        if (!$product) {
            // Jika product tidak ditemukan, kembalikan respons error
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        // Kembalikan data dalam format JSON
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get product success',
            'data' => $product
        ]);
    }
}
