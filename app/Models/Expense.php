<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Return the sum of all expenses related to one project and specific month (when expense has been made)
    public static function expensesTotal($project_id)
    {
        $expensesTotal = Expense::all()->
            where('expenses.project_id', $project_id)->
            sum('expenses.amount_euros');

        return $expensesTotal;
    }

    public static function expensesByProjectId($projectId)
    {
        return Expense::all()->where('expenses.project_id', $projectId);

    }
}
