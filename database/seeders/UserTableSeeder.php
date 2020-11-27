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
                'id' => '3',
                'name' => 'Parasts Darbinieks',
                'email' => 'employee@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'jobTitle' => 'Personāldaļas speciālists',
                'phone' => '+371 22334455'
            ],
            [
                'id' => '2',
                'name' => 'Projektu Vadītājs',
                'email' => 'manager@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'jobTitle' => 'Pārdošanas nodaļas vecākais projektu vadītājs',
                'phone' => '+371 29988776'
            ],
            [
                'id' => '1',
                'name' => 'Administrators',
                'email' => 'admin@email.com',
                'password' => Hash::make('lotisarezgitaparole'),
                'jobTitle' => 'IT sistēmas administrators',
                'phone' => '+371 29988776'
            ]
        ]);
    }
}
