<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $casts = [
        'working_hours' => 'array'
    ];

    protected $fillable = [
        'user_id', 
        'project_id', 
        'timesheet_month', 
        'timesheet_year', 
        'working_hours'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function saveFromArray(int $userId, int $projectId, string $month, int $year, array $hours)
    {
        WorkingHour::updateOrCreate(
            [
                'user_id' => $userId,
                'project_id' => $projectId,
                'timesheet_month' => $month,
                'timesheet_year' => $year
            ],
            ['working_hours' => $hours]
        );
    }

    public static function getByUserAndDate(User $user, string $month, int $year)
    {
        return WorkingHour::all()
            ->where('user_id', $user->id)
            ->where('timesheet_month', $month)
            ->where('timesheet_year', $year);
    }
}