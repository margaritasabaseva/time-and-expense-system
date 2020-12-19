<?php

namespace Database\Seeders;

// use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Parasts Darbinieks',
                'email' => 'employee@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Personāldaļas speciālists',
                'phone' => '+371 22334455'
            ],
            [
                'name' => 'Projektu Vadītājs',
                'email' => 'manager@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Pārdošanas nodaļas vecākais projektu vadītājs',
                'phone' => '+371 29988776'
            ],
            [
                'name' => 'Administrators',
                'email' => 'admin@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'IT sistēmas administrators',
                'phone' => '+371 29988776'
            ],
            [
                'name' => 'Parasts Darbinieks 2',
                'email' => 'employee2@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 2',
                'phone' => '+371 29988776'
            ],
            [
                'name' => 'Parasts Darbinieks 3',
                'email' => 'employee3@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 3',
                'phone' => '+371 29988776'
            ],
            [
                'name' => 'Parasts Darbinieks 4',
                'email' => 'employee4@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 4',
                'phone' => '+371 29988776'
            ],
            [
                'name' => 'Projektu Vadītājs 2',
                'email' => 'manager2@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Projektu Vadītājs 2',
                'phone' => '+371 29988776'
            ]
        ]);
    }
}
