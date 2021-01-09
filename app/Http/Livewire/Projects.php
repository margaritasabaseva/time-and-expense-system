<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\Expense;
use App\Models\User;
use App\Services\ProjectExpensesService;

class Projects extends Component
{
    use WithPagination;

    public $title;
    public $project_description;
    public $responsible_manager;
    public $start_date;
    public $start_day;
    public $start_month;
    public $start_year;
    public $project_id;
    public $totalExpenses;

    public $projectModelId;
    public $projectModalFormVisible = false;
    public $confirmDeleteProjectVisible = false;
    public $projectExpensesModalVisible = false;

    public $perPage = 5;
    public $sortBy = 'title';
    public $sortDirection = 'asc';
    public $search = '';


    // Project Methods

    public function rules()
    {
        return [
            'title' => 'required|max:120',
            'project_description' => 'required',
            'responsible_manager' => 'required|max:120',
            'start_day' => 'required|numeric',
            'start_month' => 'required|max:20',
            'start_year' => 'required|numeric',
        ];
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function createProject()
    {
        $this->validate();
        Project::create($this->projectModelData());
        $this->projectModalFormVisible = false;
        $this->resetVars();
        session()->flash('successCreateProject', 'Projekts veiksmīgi pievienots.');
    }

    public function createProjectModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->projectModalFormVisible = true;
    }

    public function readProjects()
    {
        return Project::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function projectModelData()
    {
        $this->start_date = \DateTime::createFromFormat(
            'Y-m-d',
            sprintf('%s-%s-%s', $this->start_year, $this->start_month, $this->start_day)
        );
        return [
            'title' => $this->title,
            'project_description' => $this->project_description,
            'responsible_manager' => $this->responsible_manager,
            'start_date' => $this->start_date,
        ];
    }

    public function updateProject()
    {
        $this->validate();
        Project::find($this->projectModelId)->update($this->projectModelData());
        $this->projectModalFormVisible = false;
        $this->resetPage();
        session()->flash('successUpdateProject', 'Projekta informācija atjaunināta.');
    }

    public function updateProjectModal($id)
    {
        $this->resetValidation();
        $this->projectModelId = $id;
        $this->projectModalFormVisible = true;
        $this->loadProjectModel();
    }

    public function deleteProject()
    {
        Project::destroy($this->projectModelId);
        $this->confirmDeleteProjectVisible = false;
        $this->resetPage();
        session()->flash('successDeleteProject', 'Projekts izdzēsts.');
    }

    public function deleteProjectModal($id)
    {
        $this->projectModelId = $id;
        $this->confirmDeleteProjectVisible = true;
        $this->loadProjectModel();
    }

    public function loadProjectModel()
    {
        $project = Project::find($this->projectModelId);
        $this->totalExpenses = ProjectExpensesService::expensesSumFromProject($project);
        $this->title = $project->title;
        $this->project_description = $project->project_description;
        $this->responsible_manager = $project->responsible_manager;
        $this->start_day = $project->start_day;
        $this->start_month = $project->start_month;
        $this->start_year = $project->start_year;
    }

    public function resetVars()
    {
        $this->projectModelId = null;
        $this->title = null;
        $this->project_description = null;
        $this->responsible_manager = null;
        $this->start_day = null;
        $this->start_month = null;
        $this->start_year = null;
    }


    // Integrating Expense Data into Project View

    public function showProjectExpenses($id)
    {
        $this->projectModelId = $id;
        $this->validate();
        $this->projectExpensesModalVisible = false;
    }

    public function showProjectExpensesModal($id)
    {
        $this->projectModelId = $id;
        $this->projectExpensesModalVisible = true;
        $this->loadProjectModel();
    }

    // Sorting, Search, Rendering

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
        $users = User::with('roles')->get();
        $expenses = Expense::orderBy('expense_date', 'desc')->get();
        return view('livewire.manager.projects', [
            'projects' => $this->readProjects(),
            'expenses' => $expenses,
            'users' => $users
        ]);
    }
}
