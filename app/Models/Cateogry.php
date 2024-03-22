<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cateogry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sluge'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
