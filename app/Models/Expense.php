<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function expenseReport()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Return the sum of all expenses related to one project and specific month (when expense has been made)
    public static function expensesTotal($project_id, $expense_month)
    {
        $expensesTotal = Expense::all()->
            where('expenses.project_id', $project_id)->
            AndWhere('expenses.expense_month', $expense_month)->
            sum('expenses.amount_euros');

        return $expensesTotal;
    }
}
