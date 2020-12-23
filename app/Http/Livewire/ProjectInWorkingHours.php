<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectInWorkingHours extends Component
{
    use WithPagination;
    public $title;
    public $project_description;
    public $responsible_manager;
    public $start_date;
    public $projectModelId;
    public $projectModalFormVisible = false;
    public $confirmDeleteProjectVisible = false;


    public function readProject(){
        return Project::all();
    }

    public function projectModelData()
    {
        return [
            'title' => $this->title,
            'project_description' => $this->project_description,
            'responsible_manager' => $this->responsible_manager,
            'start_date' => $this->start_date,
        ];
    }

    public function loadProjectModel()
    {
        $projects = Project::find($this->projectModelId);
        $this->title = $projects->title;
        $this->project_description = $projects->project_description;
        $this->responsible_manager = $projects->responsible_manager;
        $this->start_date = $projects->start_date;
    }

    public function render()
    {
        return view('livewire.employee.project-in-working-hours',[
            'projects' => $this->readProject(),
        ]);
    }
}
