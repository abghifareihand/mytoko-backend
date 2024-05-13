<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rating',
    ];

    /**
     * Mendefinisikan relasi antara Review dan User.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email');
    }

    /**
     * Mendefinisikan relasi antara Review dan Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
