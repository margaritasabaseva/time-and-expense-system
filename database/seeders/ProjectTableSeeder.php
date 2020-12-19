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
                'title' => 'Projekts 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 5',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 6',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ],
            [
                'title' => 'Projekts 7',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'responsible_manager' => 'Anna Kalniņa',
                'start_date' => '2020-02-25'
            ]
        ]);
    }
}
