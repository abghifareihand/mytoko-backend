<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil order berdasarkan ID
        $order = Order::findOrFail($id);

        // Menyertakan data order ke dalam tampilan show.blade.php
        return view('pages.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil order berdasarkan ID
        $order = Order::findOrFail($id);

        // Menampilkan form edit status
        return view('pages.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        // Update status pesanan
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('order.index')->with('success', 'Status Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $trx_number = $order->trx_number;
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order ID ' . $trx_number . ' deleted successfully.');
    }
}
