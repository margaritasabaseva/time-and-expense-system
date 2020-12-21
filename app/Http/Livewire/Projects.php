<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $title;
    public $description;
    public $responsible_manager;
    public $start_date;
    // public $project_id;

    public $projectModelId;
    public $projectModalFormVisible = false;
    public $confirmDeleteProjectVisible = false;
    public $projectExpensesModalVisible = false;

    public $perPage = 5;
    public $sortBy = 'title';
    public $sortDirection = 'asc';
    public $search = '';

    public function rules()
    {
        return [
            'title' => 'required|max:120',
            'description' => 'required',
            'responsible_manager' => 'required|max:120',
            'start_date' => 'required|date_format:Y-m-d',
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
        return Project::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function projectModelData()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'responsible_manager' => $this->responsible_manager,
            'start_date' => $this->start_date,
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

    public function showProjectExpenses($id)
    {
        $this->projectModelId = $id;
        $this->validate();
        $this->projectExpensesModalVisible = false;
    }

    public function showProjectExpensesModal($id)
    {
        $this->resetValidation();
        $this->projectModelId = $id;
        $this->projectExpensesModalVisible = true;
        $this->loadProjectModel();
    }

    public function loadProjectModel()
    {
        $projects = Project::find($this->projectModelId);
        $this->title = $projects->title;
        $this->description = $projects->description;
        $this->responsible_manager = $projects->responsible_manager;
        $this->start_date = $projects->start_date;
    }

    public function resetVars()
    {
        $this->projectModelId = null;
        $this->title = null;
        $this->description = null;
        $this->responsible_manager = null;
        $this->start_date = null;
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.manager.projects',[
            'projects' => $this->readProject(),
        ]);
    }
}
