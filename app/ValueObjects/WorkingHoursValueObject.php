<?php


namespace App\ValueObjects;

use App\Models\WorkingHour;

class WorkingHoursValueObject
{
    private $workingHours = [];

    public function workingHours()
    {
        return $this->workingHours();
    }

    public function addWorkingHour(WorkingHour $workingHour)
    {
        $this->workingHours[] = $workingHour;
    }
}
