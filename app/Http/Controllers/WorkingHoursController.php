<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHours;

class WorkingHoursController extends Controller
{
    public function indexWorkingHours()
    {
        // $workingHours = WorkingHours::all();
        // return view('employee.working-hours', ['workingHours' => $workingHours]);
    }

    public function store(Request $request)
    {
        $workingHours = WorkingHours::create($request->all());
        return redirect()->route('employee.working-hours');
    }
}
