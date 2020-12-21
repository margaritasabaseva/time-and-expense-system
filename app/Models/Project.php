<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('title', 'like', '%'.$value.'%')
            ->Orwhere('description', 'like', '%'.$value.'%')
            ->Orwhere('responsible_manager', 'like', '%'.$value.'%')
            ->Orwhere('start_date', 'like', '%'.$value.'%');
    }
}
