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
    public function expensesTotal($expensesTotal){
        $expensesTotal = Expense::with( 'project' )->
            join( 'projects', 'project.id', '=', 'expenses.projects_id' )->
            where( 'expenses.expense_month', 'Novembris' )->
            sum( 'expenses.amount_euros' );

        return $expensesTotal;
    }
}
