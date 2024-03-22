<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
    'quantity'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
