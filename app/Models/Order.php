<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'trx_number',
        'status',
        'payment_method',
        'total_price',
        'shipping_cost',
        'grand_total',
        'payment_va_name',
        'payment_va_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'role');
    }

    public function address()
    {
        return $this->belongsTo(Address::class)->select('id', 'name', 'phone', 'full_address');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
