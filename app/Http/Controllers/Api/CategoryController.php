<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori
        $categories = Category::all();

        // Kembalikan respons JSON dengan data kategori
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get categories success',
            'data' => $categories
        ]);
    }

    public function show($id)
    {
        // Mengambil kategori berdasarkan ID dan memuat produk terkait
        $category = Category::with('products')->find($id);

        if (!$category) {
            // Jika kategori tidak ditemukan, kembalikan respons error
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'Category not found',
                'data' => null
            ], 404);
        }

        // Jika kategori ditemukan, kembalikan respons JSON dengan data kategori
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get category by id success',
            'data' => $category
        ]);
    }
}
