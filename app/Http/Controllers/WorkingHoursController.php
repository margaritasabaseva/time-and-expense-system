<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHours;

class WorkingHoursController extends Controller
{
    public function indexWorkingHours()
    {
        $workingHours = WorkingHours::all();
        return view('employee.working-hours', ['workingHours' => $workingHours]);
    }
}
