<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    // product berasal dari category tertentu
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // product memiliki banyak image atau lebih dari satu
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    // Define the reverse relationship with the Favorite model
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Product memiliki banyak ulasan
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
