<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        Group::create(array('id' => 1,
            'name' => 'Pamatlietotājs',
            'description' => 'Darbinieks ar pamatlietotāja tiesībām – iespējams ievadīt savas darba stundas un veiktās izmaksas.'));
        Group::create(array('id' => 2,
            'name' => 'Projektu vadītājs/ Grāmatvedis',
            'description' => 'Darbinieks ar projektu vadītāja/ grāmatveža tiesībām - iespējams apskatīt citu darbinieku ievadītās stundas un rediģēt projektu informāciju.'));
        Group::create(array('id' => 3,
            'name' => 'Administrators',
            'description' => 'Darbinieks ar administratora tiesībām – iespējams reģistrēt jaunus lietotājus, kā arī apskatīt, bloķēt/atbloķēt un dzēst esošos.'));
    }
}
