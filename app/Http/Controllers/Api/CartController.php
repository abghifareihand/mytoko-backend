<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $carts = Cart::where('user_id', $request->user()->id)->with(['product', 'product.galleries' => function ($query) {
            $query->take(1); // Ambil hanya satu galeri dengan indeks ke-0
        }])->get();
        return response()->json([
            'code' => 201,
            'success' => true,
            'message' => 'Get cart user success',
            'data' => $carts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Cek apakah produk sudah ada di keranjang pengguna
        $existingCart = Cart::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCart) {
            // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            $existingCart->quantity += 1;
            $existingCart->save();
            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Product quantity updated successfully',
                'data' => $existingCart
            ], 200);
        } else {
            // Jika produk belum ada di keranjang, tambahkan ke keranjang
            $cart = Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }
        return response()->json([
            'code' => 201,
            'success' => true,
            'message' => 'Cart created success',
            'data' => $cart
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
        // Validasi data yang dikirim dalam permintaan
        $request->validate([
            'quantity' => 'required|integer|min:1', // pastikan quantity adalah angka dan minimal 1
        ]);

        // Temukan keranjang yang ingin diupdate
        $cart = Cart::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        // Perbarui jumlah produk dalam keranjang
        $cart->quantity = $request->quantity;
        $cart->save();

        // Kembalikan respons sukses
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Quantity updated successfully',
            'data' => $cart,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // temukan cart dengan id dan user_id yang sesuai
        $cart = Cart::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        // lalu hapus cart tersebut
        $cart->delete();

        // kemudian kembalikan respons sukses
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Cart deleted successfully',
        ]);
    }
}
