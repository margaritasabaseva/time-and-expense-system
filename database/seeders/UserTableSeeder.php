<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(array('id' => 1,
            'name' => 'Administrators',
            'email' => 'admin@company',
            'password' => bcrypt('secret')));
        User::create(array('id' => 2,
            'name' => 'Projektu Vadītājs',
            'email' => 'projvads@company',
            'password' => bcrypt('secret')));
        User::create(array('id' => 3,
            'name' => 'Parasts Darbinieks',
            'email' => 'darbinieks@company',
            'password' => bcrypt('secret')));
    }
}
