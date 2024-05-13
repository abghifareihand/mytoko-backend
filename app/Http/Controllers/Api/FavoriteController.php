<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    public function index(Request $request)
    {
        $favorite = Favorite::where('user_id', $request->user()->id)
            ->with('product')
            ->get();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get favorite product',
            'data' => $favorite,
        ]);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id'
    //     ]);

    //     $existingFavorite = Favorite::where('user_id', $request->user()->id)
    //         ->where('product_id', $request->product_id)
    //         ->exists();

    //     // Jika produk sudah ada dalam daftar favorit pengguna, kembalikan respons dengan pesan error
    //     if ($existingFavorite) {
    //         return response()->json([
    //             'code' => 400,
    //             'success' => false,
    //             'message' => 'Product already exists in favorites',
    //         ], 400);
    //     }

    //     $favorite = Favorite::create([
    //         'user_id' => $request->user()->id,
    //         'product_id' => $request->product_id,
    //     ]);

    //     // Kembalikan respons sukses
    //     return response()->json([
    //         'code' => 201,
    //         'success' => true,
    //         'message' => 'Product added to favorites successfully',
    //         'data' => $favorite,
    //     ], 201);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Request $request, string $id)
    // {
    //     // Temukan favorite berdasarkan ID dan user_id
    //     $favorite = Favorite::where('id', $id)
    //         ->where('user_id', $request->user()->id)
    //         ->first();

    //     // Jika favorite tidak ditemukan, kembalikan respons dengan status kode 404
    //     if (!$favorite) {
    //         return response()->json([
    //             'code' => 404,
    //             'success' => false,
    //             'message' => 'Favorite id ' . $id . ' not found',
    //         ], 404);
    //     }

    //     $userName = $request->user()->name;
    //     $productName = $favorite->product->name;

    //     // Hapus favorite
    //     $favorite->delete();

    //     // Kembalikan respons sukses
    //     return response()->json([
    //         'code' => 200,
    //         'success' => true,
    //         'message' => 'Favorite for user ' . $userName . ' with id ' . $id . ' (product: ' . $productName . ') deleted successfully',
    //     ]);
    // }

    /**
     * Add or remove a product from favorites.
     */
    public function favorite(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $existingFavorite = Favorite::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->exists();

        // Jika produk sudah ada dalam daftar favorit pengguna, hapus favorit tersebut
        if ($existingFavorite) {
            Favorite::where('user_id', $request->user()->id)
                ->where('product_id', $request->product_id)
                ->delete();

            return response()->json([
                'product_id' => $request->product_id,
                'is_favorite' => false,
                'message' => 'Product removed from favorites successfully',
            ]);
        }

        // Jika produk belum ada dalam daftar favorit pengguna, tambahkan ke daftar favorit
        Favorite::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
        ]);

        return response()->json([
            'product_id' => $request->product_id,
            'is_favorite' => true,
            'message' => 'Product added to favorites successfully',
        ]);
    }
}
