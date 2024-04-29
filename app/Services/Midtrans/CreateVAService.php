<?php

namespace App\Services\Midtrans;

use Midtrans\CoreApi;
use Midtrans\Snap;

class CreateVAService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getVA()
    {

        // Inisialisasi item details
        $items = [];
        foreach ($this->order->orderItems as $orderItem) {
            $items[] = [
                'id' => $orderItem->product->id,
                'price' => $orderItem->product->price,
                'quantity' => $orderItem->quantity,
                'name' => $orderItem->product->name,
            ];
        }

        $items[] = [
            'id' => 'shipping',
            'price' => $this->order->shipping_cost,
            'quantity' => 1,
            'name' => 'Shipping Cost',
        ];


        $transaction_data = [
            'transaction_details' => [
                'order_id' => $this->order->trx_number,
                'gross_amount' => $this->order->grand_total,
            ],
            'payment_type' => 'bank_transfer',
            'bank_transfer' => [
                'bank' => $this->order->payment_va_name,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => $this->order->user->name,
                'phone' => $this->order->user->phone,
                'email' => $this->order->user->email,
                'billing_address' => [
                    'address' => $this->order->user->name,
                    'city' => $this->order->address->full_address,
                ],

            ]
        ];

        $response = CoreApi::charge($transaction_data);

        return $response;
    }
}
