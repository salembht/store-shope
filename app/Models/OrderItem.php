<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'quantity',
'unit_price'
    ];
   public function orders()
   {
    return $this->hasOne(Order::class);
   }
   public function products()
   {
    return $this->hasMany(Product::class);
   }
}
