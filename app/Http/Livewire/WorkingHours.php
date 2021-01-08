<?php

namespace App\Http\Livewire;

use App\Services\DateService;
use Livewire\Component;
use App\Models\WorkingHour;
use App\Models\Project;
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

    public $projectSlot1_data;
    public $projectSlot2_data;
    public $projectSlot3_data;
    public $projectSlot4_data;
    public $projectSlot5_data;

    public $title;
    public $projectModelId;

    protected $listeners = [
        'yearChanged' => 'resetGrid',
        'monthChanged' => 'resetGrid',
        'hoursChanged' => 'hoursChanged'
    ];

    public function resetGrid()
    {
        $this->resetVars();
        $this->dateChanged();
    }

    public function resetVars() 
    {
        $this->projectSlot1 = null;
        $this->projectSlot2 = null;
        $this->projectSlot3 = null;
        $this->projectSlot4 = null;
        $this->projectSlot5 = null;
        $this->projectSlot1_data = null;
        $this->projectSlot2_data = null;
        $this->projectSlot3_data = null;
        $this->projectSlot4_data = null;
        $this->projectSlot5_data = null;
    }

    public function submit()
    {
        $hasChanged = false;
        $hasHours = false;

        if (!is_null($this->projectSlot1)) {
            WorkingHour::saveFromArray($this->user_id, $this->projectSlot1, $this->timesheet_month, $this->timesheet_year, $this->projectSlot1_data);
            $hasChanged = true;
            if ($this->arrayHasHours($this->projectSlot1_data)) {
                $hasHours = true;
            }
        }
        if (!is_null($this->projectSlot2)) {
            WorkingHour::saveFromArray($this->user_id, $this->projectSlot2, $this->timesheet_month, $this->timesheet_year, $this->projectSlot2_data);
            $hasChanged = true;
            if ($this->arrayHasHours($this->projectSlot2_data)) {
                $hasHours = true;
            }
        }
        if (!is_null($this->projectSlot3)) {
            WorkingHour::saveFromArray($this->user_id, $this->projectSlot3, $this->timesheet_month, $this->timesheet_year, $this->projectSlot3_data);
            $hasChanged = true;
            if ($this->arrayHasHours($this->projectSlot3_data)) {
                $hasHours = true;
            }
        }
        if (!is_null($this->projectSlot4)) {
            WorkingHour::saveFromArray($this->user_id, $this->projectSlot4, $this->timesheet_month, $this->timesheet_year, $this->projectSlot4_data);
            $hasChanged = true;
            if ($this->arrayHasHours($this->projectSlot4_data)) {
                $hasHours = true;
            }
        }
        if (!is_null($this->projectSlot5)) {
            WorkingHour::saveFromArray($this->user_id, $this->projectSlot5, $this->timesheet_month, $this->timesheet_year, $this->projectSlot5_data);
            $hasChanged = true;
            if ($this->arrayHasHours($this->projectSlot5_data)) {
                $hasHours = true;
            }
        }
        if ($hasChanged && $hasHours) {
            session()->flash('successSubmitTimesheet', 'Stundas saglabātas.');
        }
        else {
            session()->flash('failedSubmitTimesheet', 'Darba stundas netika ievadītas.');
        }
    }

    public function timesheetModelData()
    {
        return [
            'user_id' => $this->user_id,
            'timesheet_month' => $this->timesheet_month,
            'timesheet_year' => $this->timesheet_year,
            'working_hours' => $this->working_hours,
        ];
    }

    public function dateChanged()
    {
        if (is_null($this->timesheet_month) || is_null($this->timesheet_year) || $this->timesheet_month=='' || $this->timesheet_year=='') {
            $this->resetVars();
            $this->monthlyWorkingHours = [];
            return;
        }

        $this->monthlyWorkingHours = [];
        $amountOfWorkingDays = DateService::daysInMonth($this->timesheet_year, $this->timesheet_month);

        for ($i = 1; $i <= $amountOfWorkingDays; $i++) {
            $this->monthlyWorkingHours[$i] = null;
        }
    }

    public function hoursChanged(string $id)
    {
        switch ($id) {
            case 'slot_1':
                $this->projectSlot1_data = $this->getHoursByProject($this->projectSlot1);
                break;
            case 'slot_2':
                $this->projectSlot2_data = $this->getHoursByProject($this->projectSlot2);
                break;
            case 'slot_3':
                $this->projectSlot3_data = $this->getHoursByProject($this->projectSlot3);
                break;
            case 'slot_4':
                $this->projectSlot4_data = $this->getHoursByProject($this->projectSlot4);
                break;
            case 'slot_5':
                $this->projectSlot5_data = $this->getHoursByProject($this->projectSlot5);
                break;

        }

        $this->dateChanged();
    }

    public function getHoursByProject($projectId)
    {
        $workingHoursFromDb = WorkingHour::all()->where('user_id', $this->user_id)
            ->where('project_id', $projectId)
            ->where('timesheet_month', $this->timesheet_month)
            ->where('timesheet_year', $this->timesheet_year)->first();

        if (is_null($workingHoursFromDb)) {
            return $this->monthlyWorkingHours;
        }
        return $workingHoursFromDb->working_hours;
    }

    public function arrayHasHours(array $hours)
    {
        $hasHours = false;
        foreach ($hours as $key=>$value) {
            if ((float)$value > 0) {
                $hasHours = true;
                break;
            }
        }
        return $hasHours;
    }

    public function readProject()
    {
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

    public function render()
    {
        $this->user_id = Auth::id();
        return view('livewire.employee.working-hours', [
            'projects' => $this->readProject(),
        ]);
    }
}
