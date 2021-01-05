<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;

class WorkingHoursController extends Controller
{
    public function save(Request $request)
    {
        $hours = request('working-hours');
        $hours = $this->remove_null($hours);
        $workingHours = new WorkingHour;
        $workingHours->user_id = auth()->id();
        $workingHours->project_id = 1;
        $workingHours->month=01;
        $workingHours->working_hours = $hours;
        $workingHours->save();
    }

    public function remove_null($hours)
    {
        $working_hours = [];

        foreach ($hours as $array_item) {
            if ($array_item['Datums'] != null) {
                array_push($working_hours, $array_item);
            }
        }

        $working_hours = json_encode($working_hours);
        return $working_hours;
    }
}
