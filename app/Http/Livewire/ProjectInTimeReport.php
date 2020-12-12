<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectInTimeReport extends Component
{
    use WithPagination;
    public $title;
    public $description;
    public $responsibleManager;
    public $startDate;
    // public $project_id;
    public $projectModelId;
    public $projectModalFormVisible = false;
    public $confirmDeleteProjectVisible = false;

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'responsibleManager' => 'required',
            'startDate' => 'required',
        ];
    }

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function createProject()
    {
        $this->validate();
        Project::create($this->projectModelData());
        $this->projectModalFormVisible = false;
        $this->resetVars();
    }

    public function createProjectModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->projectModalFormVisible = true;
    }

    public function readProject(){
        return Project::paginate(5);
    }

    public function projectModelData()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'responsibleManager' => $this->responsibleManager,
            'startDate' => $this->startDate,
        ];
    }

    public function updateProject()
    {
        $this->validate();
        Project::find($this->projectModelId)->update($this->projectModelData());
        $this->projectModalFormVisible = false;
    }

    public function updateProjectModal($id)
    {
        $this->resetValidation();
        $this->projectModelId = $id;
        $this->projectModalFormVisible = true;
        $this->loadProjectModel();
        // $this->resetVars();
    }

    public function deleteProject(){
        Project::destroy($this->projectModelId);
        $this->confirmDeleteProjectVisible = false;
        $this->resetPage();
    }

   public function deleteProjectModal($id)
   {
        $this->modelId = $id;
        $this->confirmDeleteProjectVisible = true;
   }

    public function loadProjectModel()
    {
        $data = Project::find($this->projectModelId);
        $this->title = $data->title;
        $this->description = $data->description;
        $this->responsibleManager = $data->responsibleManager;
        $this->startDate = $data->startDate;
    }

    public function resetVars()
    {
        $this->projectModelId = null;
        $this->title = null;
        $this->description = null;
        $this->responsibleManager = null;
        $this->startDate = null;
    }

    public function render()
    {
        return view('livewire.project-in-time-report',[
            'data' => $this->readProject(),
        ]);
    }
}
