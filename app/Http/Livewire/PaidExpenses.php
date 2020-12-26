<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expense;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class PaidExpenses extends Component
{
    use WithPagination;

    public $vendor;
    public $document_number;
    public $amount_euros;
    public $expense_day;
    public $expense_month;
    public $expense_year;
    public $expense_description;
    public $project_id;
    public $user_id;

    public $expenseModelId;
    public $expenseModalFormVisible = false;
    public $confirmDeleteExpenseVisible = false;

    // public $perPage = 10;
    public $sortBy = 'project_id';
    public $sortDirection = 'asc';


    public function rules()
    {
        return [
            'vendor' => 'required|max:255',
            'document_number' => 'required|max:120',
            'amount_euros' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'expense_day' => 'required|numeric',
            'expense_month' => 'required|max:20',
            'expense_year' => 'required|numeric',
            'expense_description' => 'required',
        ];
    }

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function createExpense()
    {
        $this->validate();
        Expense::create($this->expenseModelData());
        $this->expenseModalFormVisible = false;
        $this->resetVars();
        session()->flash('successCreateExpense', 'Ieraksts veiksmīgi pievienots.');
    }

    public function createExpenseModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->expenseModalFormVisible = true;
    }

    public function readExpense()
    {
        return Expense::orderBy($this->sortBy, $this->sortDirection)->get();
        // return Expense::query()
        //     ->orderBy($this->sortBy, $this->sortDirection)
        //     ->paginate($this->perPage);
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
    
    public function deleteExpense(){
        Expense::destroy($this->expenseModelId);
        $this->confirmDeleteExpenseVisible = false;
        $this->resetPage();
        session()->flash('successDeleteExpense', 'Ieraksts izdzēsts.');
    }

   public function deleteExpenseModal($id)
   {
        $this->expenseModelId = $id;
        $this->confirmDeleteExpenseVisible = true;
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

    public function resetVars()
    {
        $this->expenseModelId = null;
        $this->project_id = null;
        $this->vendor = null;
        $this->document_number = null;
        $this->amount_euros = null;
        $this->expense_day = null;
        $this->expense_month = null;
        $this->expense_year = null;
        $this->expense_description = null;
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

    public function render()
    {
        $projects = Project::all();
        return view('livewire.employee.paid-expenses', [
            'expenses' => $this->readExpense(),
            'projects' => $projects
        ]);
    }
}
