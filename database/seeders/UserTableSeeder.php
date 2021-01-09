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
                'job_title' => 'Biroja asistents',
                'phone' => '22334455',
                'address' => 'Aizupes iela 15 k-1, dz.66, Rīga, LV-1004'
            ],
            [
                'name' => 'Projektu Vadītājs',
                'email' => 'manager@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Pārdošanas nodaļas vecākais projektu vadītājs',
                'phone' => '29988776',
                'address' => 'Krišjāņa Valdemāra iela 93A, dz.12, Rīga, LV-1013'
            ],
            [
                'name' => 'Administrators',
                'email' => 'admin@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'IT sistēmas administrators',
                'phone' => '29343323',
                'address' => 'Nākotnes iela 3, Māriņkalns, Ziemera pagasts, Alūksnes novads, LV-4332'
            ],
            [
                'name' => 'Parasts Darbinieks 2',
                'email' => 'employee2@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 2',
                'phone' => '29153477',
                'address' => NULL
            ],
            [
                'name' => 'Parasts Darbinieks 3',
                'email' => 'employee3@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 3',
                'phone' => '27431222',
                'address' => NULL
            ],
            [
                'name' => 'Parasts Darbinieks 4',
                'email' => 'employee4@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Parasts Darbinieks 4',
                'phone' => '21234098',
                'address' => NULL
            ],
            [
                'name' => 'Projektu Vadītājs 2',
                'email' => 'manager2@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Projektu Vadītājs 2',
                'phone' => '20977097',
                'address' => NULL
            ],
            [
                'name' => 'Projektu Vadītājs 3',
                'email' => 'manager3@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Projektu Vadītājs 3',
                'phone' => '28483253',
                'address' => NULL
            ],
            [
                'name' => 'Projektu Vadītājs 4',
                'email' => 'manager4@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'job_title' => 'Projektu Vadītājs 4',
                'phone' => '29987777',
                'address' => NULL
            ]
        ]);
    }
}
