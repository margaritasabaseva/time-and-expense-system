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
                'name' => 'Parasts Darbinieks Jānis',
                'email' => 'employee@email.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => '2',
                'name' => 'Projektu Vadītāja Līga',
                'email' => 'manager@email.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => '1',
                'name' => 'Administrators Anna',
                'email' => 'admin@email.com',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
