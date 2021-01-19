<?php
namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
     public function hasRole(... $roles ) {
         foreach ($roles as $role) {
             if ($this->roles->contains('slug', $role)) {
                 return true;
             }
         }
         return false;
     }
}
