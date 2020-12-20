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
                'project_id' => '1',
                'user_id' => '1',
                'working_hours' => 'Personāldaļas speciālists',
                'month' => '11'
            ]
        ]);
    }
}
