<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // attach or sync method
        $user = User::find(1);
        $user->roles()->attach(1);

        $user = User::find(2);
        $user->roles()->attach([1, 2]);

        $user = User::find(3);
        $user->roles()->attach([1, 3]);

        $user = User::find(4);
        $user->roles()->attach(1);

        $user = User::find(5);
        $user->roles()->attach(1);

        $user = User::find(6);
        $user->roles()->attach(1);

        $user = User::find(7);
        $user->roles()->attach([1, 2]);

        $user = User::find(8);
        $user->roles()->attach(2);

        $user = User::find(9);
        $user->roles()->attach(2);
    }
}
