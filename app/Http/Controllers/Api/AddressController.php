<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $address = Address::where('user_id', $request->user()->id)->get();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Get address success',
            'data' => $address,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'full_address' => 'required',
        ]);

        $address = Address::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'full_address' => $request->full_address,
        ]);

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Address created successfully',
            'data' => $address,
        ]);
    }

    public function destroy(Request $request, string $id)
    {
        // Temukan alamat berdasarkan ID dan user_id
        $address = Address::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        // Jika alamat tidak ditemukan, kembalikan respons dengan status kode 404
        if (!$address) {
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'Address with id ' . $id . ' not found',
            ], 404);
        }

        // Hapus alamat
        $address->delete();

        // Kembalikan respons sukses
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Address deleted successfully',
        ]);
    }
}
