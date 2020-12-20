<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expense;

class PaidExpenses extends Component
{
    use WithPagination;
    public $vendor;
    public $document_number;
    public $amount_euros;
    public $expense_date;
    public $description;
    public $project_id;
    // public $user_id;
    public $expenseModelId;
    public $expenseModalFormVisible = false;
    public $confirmDeleteExepnseVisible = false;

    public function rules()
    {
        return [
            'vendor' => 'required|max:255',
            'document_number' => 'required|max:120',
            'amount_euros' => 'required|numeric',
            'expense_date' => 'required|date',
            'description' => 'required',
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
    }

    public function createExpenseModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->expenseModalFormVisible = true;
    }

    public function readExpense(){
        return Expense::paginate(10);
    }

    public function expenseModelData()
    {
        return [
            'project_id' => $this->project_id,
            'vendor' => $this->vendor,
            'document_number' => $this->document_number,
            'amount_euros' => $this->amount_euros,
            'expense_date' => $this->expense_date,
            'description' => $this->description,
        ];
    }
    
    public function deleteExpense(){
        Expense::destroy($this->expenseModelId);
        $this->confirmDeleteExpenseVisible = false;
        $this->resetPage();
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
        $this->vendor = $expenses->vendor;
        $this->document_number = $expenses->document_number;
        $this->amount_euros = $expenses->amount_euros;
        $this->expense_date = $expenses->expense_date;
        $this->description = $expenses->description;
    }

    public function resetVars()
    {
        $this->expenseModelId = null;
        $this->vendor = null;
        $this->document_number = null;
        $this->amount_euros = null;
        $this->expense_date = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.employee.paid-expenses', [
            'expenses' => $this->readExpense()
        ]);
    }
}
