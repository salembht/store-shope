<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{
    use HasFactory;
    protected $fillable =[
        'type',
'address1',
'address2',
'city',
'state',
'zipcode', 
'isMain',
'country_code',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
