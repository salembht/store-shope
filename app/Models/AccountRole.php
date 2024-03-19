<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountRole extends Model
{
    use HasFactory;

    protected $table = 'account__roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'label',
    ];

    
    
    public function permissions()
    {
        return $this->belongsToMany(AccountPermission::class, 'account__roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'account__roles_users');
    }
}
