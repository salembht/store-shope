<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'total_price',
        'status',
        'session_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function userAddresss()
    {
        return $this->hasOne(userAddress::class);
    }
}
