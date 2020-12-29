<?php

namespace App\ValueObjects;

final class RoleWithStateVo
{
    public $roleId;
    public $roleTitle;
    public $checked;

    public function __construct(int $roleId, string $roleTitle, bool $checked)
    {
        $this->roleId = $roleId;
        $this->roleTitle = $roleTitle;
        $this->checked = $checked;
    }

    public function toArray()
    {
        return [
            'roleId' => $this->roleId,
            'roleTitle' => $this->roleTitle,
            'checked' => $this->checked
        ];
    }
}
