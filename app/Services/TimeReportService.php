<?php


namespace App\Services;

use App\Models\WorkingHour;
use Illuminate\Database\Eloquent\Collection;

class TimeReportService
{
    private function hoursSumFromReport(WorkingHour $workingHour)
    {
        $hoursSum = 0;
        $workingHours = $workingHour->working_hours;
        foreach ($workingHours as $key=>$value) {
            $hoursSum += (float)$value;
        }
        return $hoursSum;
    }

    public function hoursPerMonthFromCollection(Collection $workingHours)
    {
        $hours = [];
        foreach ($workingHours as $singleReport) {
            $hours[$singleReport->project->title] = $this->hoursSumFromReport($singleReport);
        }

        return $hours;
    }
    
    public function hoursSumByUser(Collection $workingHours)
    {
        $hours = 0;
        foreach ($workingHours as $singleReport) {
            $hours += $this->hoursSumFromReport($singleReport);
        }

        return $hours;
    }
}
