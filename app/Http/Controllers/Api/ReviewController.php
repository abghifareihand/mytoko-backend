<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        // Cek apakah pengguna sudah memberikan review untuk produk ini
        $existingReview = Review::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->exists();

        // Jika sudah memberikan review, kembalikan respons dengan pesan error
        if ($existingReview) {
            return response()->json([
                'code' => 400,
                'success' => false,
                'message' => 'You have already reviewed this product',
            ], 400);
        }

        // Buat review baru
        $review = Review::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Kembalikan respons sukses
        return response()->json([
            'code' => 201,
            'success' => true,
            'message' => 'Review added successfully',
            'data' => $review,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(Request $request, string $id)
    {
        // Cari review berdasarkan product_id dan user_id
        $review = Review::where('product_id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        // Jika review tidak ditemukan, kembalikan respons dengan pesan error
        if (!$review) {
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'Review not found for this product and user',
            ], 404);
        }

        // Hapus review
        $review->delete();

        // Kembalikan respons sukses
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Review deleted successfully',
        ]);
    }
}
