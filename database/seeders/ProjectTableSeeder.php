<?php

namespace Database\Seeders;

// use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'id' => '1',
                'title' => 'Projekts 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '2',
                'title' => 'Projekts 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '3',
                'title' => 'Projekts 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '4',
                'title' => 'Projekts 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '5',
                'title' => 'Projekts 5',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '6',
                'title' => 'Projekts 6',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ],
            [
                'id' => '7',
                'title' => 'Projekts 7',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsibleManager' => 'Anna Kalniņa',
                'startDate' => '02-10-2020'
            ]
        ]);
    }
}
