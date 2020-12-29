<?php

namespace App\Services;

use App\Models\Role;
use App\ValueObjects\RoleWithStateVo;

class RolesStateService
{
    public static function changeRolesStateFromUser(object $allRoles, object $userRoles): array
    {
        $valueObjects = [];

        /** @var Role $baseRole */
        foreach ($allRoles as $baseRole) {

            /** @var Role $userRole */
            $check = false;
            foreach ($userRoles as $userRole) {
                if ($userRole->id === $baseRole->id) {
                    $check = true;
                }
            }
            $valueObjects[] = (new RoleWithStateVo($baseRole->id, $baseRole->role_title, $check))->toArray();
        }

        return $valueObjects;
    }
}
