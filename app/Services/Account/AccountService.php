<?php

namespace App\Services\Account;

use App\Models\AccountUser;
use App\Models\AccountRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountService
{
    /**
     * Get an instance of the AccountService.
     *
     * @return \App\Services\Account\AccountService
     */
    

    /**
     * Check if the authenticated user has the given permission.
     *
     * @param  string  $permission
     * @param  int|null  $tenantId
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }
        $permissions = array();
        $user = User::find($user->id);
        $roles = $user->roles;
        foreach ($roles as $key => $_role) {
            $role = AccountRole::find($_role->id);
            $role_permissions = $role->permissions;
            foreach ($role_permissions as $key => $value) {
                array_push($permissions, $value->name);
            }
        }
        foreach ($permissions as $key => $value) {
            if ($permission == $value) {
                return true;
            }
        }
        return false;
    }
    public function hasPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }
    public function update(array $data, $id)
    {
        $user = User::find($id);
        $user->fill($data);
        foreach ($data['roles'] as $role) {
            $role = AccountRole::where("name", $role)->first();
            $user->roles()->sync($role->id);
        }
        $user->save();
    }

    public function assignUserToRole(User $user, AccountRole $role): bool
    {
        return false;
    }

    public function listUserRoles(string $username): array
    {

        return array();
    }

    public function getAllRoles($user_id)
    {
        $user = User::find($user_id);
        return $user->roles->pluck('name');
    }

    

  
    public function getAll()
    {
        return User::all();
    }
    public function get($id)
    {
        return User::find($id);
    }
    
    public function create($name, $email, $role,$password)
    {
        $role = AccountRole::where('name', $role)->first()->id;
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password =Hash::make($password);
        $user->save();
        $user->roles()->sync($role);
        return $user;
    }
    public function destroy($id)
    {
        User::destroy($id);
    }
}