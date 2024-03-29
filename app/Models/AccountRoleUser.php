<?php

namespace App\Models;

use App\Models\AccountRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AccountRoleUser extends Pivot
{
    protected $table = 'account__roles_users';

    // Define the relationship with the AccountRole model
    public function role()
    {
        return $this->belongsTo(AccountRole::class, 'role_id');
    }

    // Define the relationship with the AccountUser model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}