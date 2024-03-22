<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'sluge',
        'quantity',
        'descrption',
        'published',
        'inStock',
        'price'
    ];
    public function cateogry()
    {
        return $this->belongsTo(Cateogry::class);
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function cartItems()
    {
        return $this->belongsTo(CartItem::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
