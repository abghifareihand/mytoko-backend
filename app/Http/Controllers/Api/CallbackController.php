<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function callback()
    {
        $callback = new CallbackService;
        $order = $callback->getOrder();

        if ($callback->isSuccess()) {
            $order->update([
                'status' => 'paid',
            ]);
        }

        if ($callback->isExpire()) {
            $order->update([
                'status' => 'expired',
            ]);
        }

        if ($callback->isCancelled()) {
            $order->update([
                'status' => 'cancelled',
            ]);
        }

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Notification midtrans callback success',
        ]);
    }
}
