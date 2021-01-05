<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\ValueObjects\RolesWithStatesVo;
use App\ValueObjects\RoleWithStateVo;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this
            ->belongsToMany(Role::class)
            ->withTimestamps();
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    // has a role that gets passed as a name of the role with this method, e.g., hasRole('ROLE_ADMIN')
    public function hasRole($role)
    {
        $roles = $this->roles->where('role_name', $role);
        if (count($roles) >= 1) {
            return true;
        }
        return false;
    }

    public function addRole(Role $newRole)
    {
        $role = $this->roles->where('role_name', $newRole->role_name);

        /** Exists, update */
        if (1 >= count($role)) {
            $this->roles()->attach($newRole->id);
            return true;
        }
        return false;
    }

    public function removeRole(Role $roleToRemove)
    {
        $role = $this->roles->where('role_name', $roleToRemove->role_name);

        if (1 <= count($role)) {
            $this->roles()->detach($roleToRemove->id);
            return true;
        }
        return false;
    }

    public function updateRolesFromStatesVo(RolesWithStatesVo $rolesWithStates)
    {
        /** @var RoleWithStateVo $roleWithState */
        foreach ($rolesWithStates->roles() as $roleWithState) {
            if ($roleWithState->checked) {

                /** @var Role $role */
                $role = Role::find($roleWithState->roleId);
                if ($this->hasRole($role->role_name)) {
                    continue;
                }

                $this->addRole($role);
            } else {
                $role = Role::find($roleWithState->roleId);
                if (!$this->hasRole($role->role_name)) {
                    continue;
                }

                $this->removeRole($role);
            }
        }
    }

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%'.$value.'%')
            ->Orwhere('email', 'like', '%'.$value.'%')
            ->Orwhere('job_title', 'like', '%'.$value.'%')
            ->Orwhere('phone', 'like', '%'.$value.'%')
            ->Orwhere('address', 'like', '%'.$value.'%');
    }
}
