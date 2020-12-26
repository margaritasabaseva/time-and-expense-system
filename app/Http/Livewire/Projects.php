<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Projects extends Component
{
    use WithPagination;
    public $title;
    public $project_description;
    public $responsible_manager;
    public $start_date;
    public $project_id;

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
            'project_description' => 'required',
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
        session()->flash('successCreateProject', 'Projekts veiksmīgi pievienots.');
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

    public function deleteProject(){
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
        $projects = Project::find($this->projectModelId);
        $this->title = $projects->title;
        $this->project_description = $projects->project_description;
        $this->responsible_manager = $projects->responsible_manager;
        $this->start_date = $projects->start_date;
    }

    public function resetVars()
    {
        $this->projectModelId = null;
        $this->title = null;
        $this->project_description = null;
        $this->responsible_manager = null;
        $this->start_date = null;
    }

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

    // ------------------------------------------------------------------------
    // Expense modal part

    // public function rules()
    // {
    //     return [
    //         'vendor' => 'required|max:255',
    //         'document_number' => 'required|max:120',
    //         'amount_euros' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    //         'expense_date' => 'required|date',
    //         'expense_description' => 'required',
    //     ];
    // }

    // public function createExpense()
    // {
    //     $this->validate();
    //     Expense::create($this->expenseModelData());
    //     $this->expenseModalFormVisible = false;
    //     $this->resetVars();
    // }

    // public function createExpenseModal()
    // {
    //     $this->resetValidation();
    //     $this->resetVars();
    //     $this->expenseModalFormVisible = true;
    // }

    public function readExpense()
    {
        return Expense::all();
    }

    public function expenseModelData()
    {
        return [
            'project_id' => $this->project_id,
            'user_id' => Auth::id(),
            'vendor' => $this->vendor,
            'document_number' => $this->document_number,
            'amount_euros' => $this->amount_euros,
            'expense_day' => $this->expense_day,
            'expense_month' => $this->expense_month,
            'expense_year' => $this->expense_year,
            'expense_description' => $this->expense_description,
        ];
    }

    public function loadExpenseModel()
    {
        $expenses = Expense::find($this->expenseModelId);
        $this->id = $expenses->id;
        $this->project_id = $expenses->project_id;
        $this->user_id = $expenses->user_id;
        $this->vendor = $expenses->vendor;
        $this->document_number = $expenses->document_number;
        $this->amount_euros = $expenses->amount_euros;
        $this->expense_day = $expenses->expense_day;
        $this->expense_month = $expenses->expense_month;
        $this->expense_year = $expenses->expense_year;
        $this->expense_description = $expenses->expense_description;

    }

    // ------------------------------------------------------------------------

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
        return view('livewire.manager.projects',[
            'projects' => $this->readProject(),
            'expenses' => $this->readExpense(),
            'users' => $users
        ]);
    }
}
