<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori
        $banners = Banner::all();

        // Kembalikan respons JSON dengan data kategori
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get banners success',
            'data' => $banners
        ]);
    }
}
