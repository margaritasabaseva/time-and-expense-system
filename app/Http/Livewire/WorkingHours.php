<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WorkingHour;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkingHours extends Component
{
    public $user_id;
    public $timesheet_month;
    public $timesheet_year;
    public $working_hours;

    public $title;
    public $projectModelId;


    // Working-hours Timesheet Methods

    public function submitTimesheet()
    {
        WorkingHour::create($this->timesheetModelData());
        $this->resetVars();
        $hours = request('working-hours');
        $hours = WorkingHour::remove_null($hours);
        session()->flash('successSubmitTimesheet', 'Stundas veiksmīgi iesniegtas.');
    }

    public function timesheetModelData()
    {
        // $dt = Carbon::(now);
        return [
            'user_id' => Auth::id(),
            'timesheet_month' => $this->timesheet_month,
            'timesheet_year' => $this->timesheet_year,
            'working_hours' => $this->working_hours,

            // maybe use Carbon for month and year (to register and to show in the blade, so users do not need to choose by themselves)
            // 'timesheet_month' => $dt->timesheet_month,
            // 'timesheet_year' => $dt->timesheet_year,
        ];
    }


    // Project Methods

    public function readProject(){
        return Project::all();
    }

    public function projectModelData()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function loadProjectModel()
    {
        $projects = Project::find($this->projectModelId);
        $this->title = $projects->title;
    }


    // Rendering

    public function render()
    {
        return view('livewire.employee.working-hours',[
            'projects' => $this->readProject(),
        ]);
    }
}
