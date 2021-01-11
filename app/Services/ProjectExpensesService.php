<?php


namespace App\Services;

use App\Models\Project;

class ProjectExpensesService
{
    // Sum of all project's expenses
    public static function expensesSumFromProject(Project $project)
    {
        $expenses = $project->expenses;
        $sum = 0;
        foreach ($expenses as $expense) {
            $sum += $expense->amount_euros;
        }
        return number_format($sum, 2, '.', '');
    }
}
