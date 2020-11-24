<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
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
        // attach vai sync method
        $user = User::find(2);

        $roles = Role::all();

        $user->roles()->attach($roles);
        // $user = User::find(1);
        // $user->roles()->attach([1, 3]);

        // $user = User::find(2);
        // $user->roles()->attach([1, 2]);

        // $user = User::find(3);
        // $user->roles()->attach(1);
    }
}
