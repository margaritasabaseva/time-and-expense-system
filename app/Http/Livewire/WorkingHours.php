<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Services\DateService;
use Illuminate\Support\Facades\Auth;

class WorkingHours extends Component
{
    public $user_id;
    public $timesheet_month;
    public $timesheet_year;
    public $working_hours;
    public $monthlyWorkingHours;
    public $projectSlot1;
    public $projectSlot2;
    public $projectSlot3;
    public $projectSlot4;
    public $projectSlot5;

    public $title;
    public $projectModelId;

    protected $listeners = [
        'yearChanged' => 'dateChanged', 
        'monthChanged' => 'dateChanged'
    ];

    // Working-hours Timesheet Methods

    public function submitWorkingHours()
    {
        dd($this->monthlyWorkingHours);
        /**WorkingHour::create($this->timesheetModelData());
         * $this->resetVars();
         * $hours = request('working-hours');
         * $hours = WorkingHour::remove_null($hours);**/
        //session()->flash('successSubmitTimesheet', 'Stundas veiksmīgi iesniegtas.');
    }

    public function timesheetModelData()
    {
        return [
            'user_id' => Auth::id(),
            'timesheet_month' => $this->timesheet_month,
            'timesheet_year' => $this->timesheet_year,
            'working_hours' => $this->working_hours,
        ];
    }

    public function dateChanged()
    {
        if (is_null($this->timesheet_month) || is_null($this->timesheet_year)) {
            return;
        }

        $this->monthlyWorkingHours = [];
        $amountOfWorkingDays = DateService::daysInMonth($this->timesheet_year, $this->timesheet_month);

        for ($i = 1; $i < $amountOfWorkingDays; $i++) {
            $this->monthlyWorkingHours[$i] = [
                "slot_1" => "",
                "slot_2" => "",
                "slot_3" => "",
                "slot_4" => "",
                "slot_5" => ""
            ];
        }
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
