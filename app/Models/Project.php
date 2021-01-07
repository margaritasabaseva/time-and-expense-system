<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function workingHoursReport()
    {
        return $this
            ->hasMany(WorkingHour::class);
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($project) {
            $project->expenses()->delete();
        });
    }

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('title', 'like', '%'.$value.'%')
            ->Orwhere('project_description', 'like', '%'.$value.'%')
            ->Orwhere('responsible_manager', 'like', '%'.$value.'%');
    }
}
