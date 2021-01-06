<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This is not the right way, json file should be fed into database through function here
        DB::table('working_hours')->insert([
            [
                'user_id' => '1',
                'project_id' => '1',
                'timesheet_month' => '1',
                'timesheet_year' => '2021',
                'working_hours' => '{"1": "", "2": "", "3": "", "4": "3.5", "5": "2", "6": "8", "7": "8", "8": "8", "9": null, "10": null, "11": null, "12": null, "13": null, "14": null, "15": null, "16": null, "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ],        
            [
                'user_id' => '1',
                'project_id' => '2',
                'timesheet_month' => '1',
                'timesheet_year' => '2021',
                'working_hours' => '{"1": null, "2": null, "3": null, "4": "4.5", "5": "6", "6": null, "7": null, "8": null, "9": null, "10": null, "11": null, "12": null, "13": null, "14": null, "15": null, "16": null, "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ],
            [
                'user_id' => '1',
                'project_id' => '9',
                'timesheet_month' => '1',
                'timesheet_year' => '2021',
                'working_hours' => '{"1": null, "2": null, "3": null, "4": null, "5": null, "6": null, "7": null, "8": null, "9": null, "10": null, "11": "8", "12": "8", "13": "8", "14": "8", "15": "8", "16": "8", "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'timesheet_month' => '12',
                'timesheet_year' => '2020',
                'working_hours' => '{"1": "", "2": "", "3": "", "4": "3.5", "5": "2", "6": "8", "7": "8", "8": "8", "9": null, "10": null, "11": null, "12": null, "13": null, "14": null, "15": null, "16": null, "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ],        
            [
                'user_id' => '1',
                'project_id' => '2',
                'timesheet_month' => '12',
                'timesheet_year' => '2020',
                'working_hours' => '{"1": null, "2": null, "3": null, "4": "4.5", "5": "6", "6": null, "7": null, "8": null, "9": null, "10": null, "11": null, "12": null, "13": null, "14": null, "15": null, "16": null, "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ],
            [
                'user_id' => '1',
                'project_id' => '11',
                'timesheet_month' => '12',
                'timesheet_year' => '2020',
                'working_hours' => '{"1": null, "2": null, "3": null, "4": null, "5": null, "6": null, "7": null, "8": null, "9": null, "10": null, "11": "8", "12": "8", "13": "8", "14": "8", "15": "8", "16": "8", "17": null, "18": null, "19": null, "20": null, "21": null, "22": null, "23": null, "24": null, "25": null, "26": null, "27": null, "28": null, "29": null, "30": null, "31": null}',
            ]
        ]);
    }
}
