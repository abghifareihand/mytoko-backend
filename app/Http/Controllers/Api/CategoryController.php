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
}
