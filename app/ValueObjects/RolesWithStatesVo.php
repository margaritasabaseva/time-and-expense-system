<?php

namespace App\ValueObjects;

class RolesWithStatesVo
{
    private $roles = [];

    public function addRole(RoleWithStateVo $roleWithState)
    {
        $this->roles[] = $roleWithState;
    }

    public function roles()
    {
        return $this->roles;
    }

    public static function fromArray(array $rolesWithStates)
    {
        $roles = new self();
        foreach ($rolesWithStates as $role) {
            $roles->addRole(new RoleWithStateVo($role["roleId"], $role["roleTitle"], $role["checked"]));
        }

        return $roles;
    }
}
