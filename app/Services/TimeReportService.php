<?php


namespace App\Services;

use App\Models\WorkingHour;
use Illuminate\Database\Eloquent\Collection;

class TimeReportService
{
    // Sum of hours for one working hours report for one project
    private function hoursSumFromReport(WorkingHour $workingHour)
    {
        $hoursSum = 0;
        $workingHours = $workingHour->working_hours;
        foreach ($workingHours as $key=>$value) {
            $hoursSum += (float)$value;
        }
        return $hoursSum;
    }

    // Collection of all the user's projects and respective hour sums for a specific month
    public function hoursPerMonthFromCollection(Collection $workingHours)
    {
        $hours = [];
        foreach ($workingHours as $singleReport) {
            $hours[$singleReport->project->title] = $this->hoursSumFromReport($singleReport);
        }

        return $hours;
    }
    
    // Sum of all the user's hours for a specific month
    public function hoursSumByUser(Collection $workingHours)
    {
        $hours = 0;
        foreach ($workingHours as $singleReport) {
            $hours += $this->hoursSumFromReport($singleReport);
        }

        return $hours;
    }
}
