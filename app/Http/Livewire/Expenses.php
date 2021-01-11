<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Expense;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Expenses extends Component
{
    use WithPagination;
    
    public $vendor;
    public $document_number;
    public $amount_euros;
    public $expense_day;
    public $expense_month;
    public $expense_year;
    public $expense_date;
    public $expense_description;
    public $project_id;
    public $user_id;

    public $expenseModelId;
    public $expenseModalFormVisible = false;
    public $confirmDeleteExpenseVisible = false;

    public $sortBy = 'project_id';
    public $sortDirection = 'asc';


    // Expense Methods

    public function rules()
    {
        return [
            'project_id'=> 'required',
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
        $this->resetPage();
    }

    public function expenseModelData()
    {
        $this->expense_date = \DateTime::createFromFormat(
            'Y-m-d',
            sprintf('%s-%s-%s', $this->expense_year, $this->expense_month, $this->expense_day)
        );
        return [
            'project_id' => $this->project_id,
            'user_id' => Auth::id(),
            'vendor' => $this->vendor,
            'document_number' => $this->document_number,
            'amount_euros' => $this->amount_euros,
            'expense_date' => $this->expense_date,
            'expense_description' => $this->expense_description,
        ];
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

    public function deleteExpense()
    {
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

    public function readExpense()
    {
        return Expense::orderBy($this->sortBy, $this->sortDirection)->get();
    }

    // Sorting and Rendering

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
        $user_expenses = (User::find(Auth::id()))->expenses();
        return view('livewire.employee.expenses', [
            'expenses' => $this->readExpense(),
            'projects' => $projects,
            'hasExpenses' => $user_expenses->count() > 0
        ]);
    }
}
