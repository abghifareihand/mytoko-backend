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
}
