<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    use HasFactory;

    protected $casts = [
        'working_hours' => 'array'
    ];

    // Eliminate null values from the array
    public function setWorkingHoursAttribute($hours)
    {
        $working_hours = [];

        foreach ($hours as $array_item) {
            if (!is_null($array_item['date'])) {
                $working_hours[] = $array_item;
            }
        }

        $this->attributes['working_hours'] = json_encode($working_hours);
    }

}
