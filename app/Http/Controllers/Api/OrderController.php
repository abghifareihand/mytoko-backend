<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
            'payment_method' => 'required',
            'shipping_cost' => 'required',
            'items' => 'required|array',
        ]);

        $totalprice = 0;
        foreach ($request->items as $item) {
            // Ambil harga produk dari database (Anda harus menyesuaikan dengan model produk Anda)
            $productprice = Product::find($item['product_id'])->price;
            // Hitung total harga produk dengan mengalikan harga dengan jumlah
            $totalprice += $productprice * $item['quantity'];
        }

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => $request->user()->id,
            'address_id' => $request->address_id,
            'trx_number' => 'TRX' . time(),
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_va_name' => $request->payment_va_name,
            'total_price' => $totalprice,
            'shipping_cost' => $request->shipping_cost,
            'grand_total' => $totalprice + $request->shipping_cost,
        ]);

        // payment va name
        // if ($request->payment_va_name) {
        //     $order->update([
        //         'payment_va_name' => $request->payment_va_name,
        //     ]);
        // }

        // Tambahkan item pesanan
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        $address = Address::select('name', 'phone', 'full_address')->find($request->address_id);

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Order success',
            'data' => [
                'order' => $order,
                'address' => $address,
            ]
        ]);
    }

    public function fetch(Request $request)
    {
        $order = Order::where('user_id', $request->user()->id)->get();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get order user success',
            'data' => $order,
        ]);
    }
}
