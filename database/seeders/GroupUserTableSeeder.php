<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class GroupUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // attach vai sync method
        $user = User::find(1);
        $user->groups()->attach(1);
        $user->groups()->attach(3);
    //     Group::create(array('id' => 1,
    //         'group_id' => '1',
    //         'user_id' => '3'));
    //     Group::create(array('id' => 2,
    //         'group_id' => '1',
    //         'user_id' => '2'));
    //     Group::create(array('id' => 2,
    //         'group_id' => '1',
    //         'user_id' => '1'));
    //     Group::create(array('id' => 2,
    //         'group_id' => '2',
    //         'user_id' => '2'));
    //     Group::create(array('id' => 3,
    //         'group_id' => '3',
    //         'user_id' => '1'));
    }
}
