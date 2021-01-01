<?php


namespace App\Services;

class DateService
{
    public static function daysInMonth($year, $month)
    {
        return date("t", mktime(0, 0, 0, $month, 1, $year));
    }
}
