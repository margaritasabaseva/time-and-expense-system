<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(array('id' => 1,
            'name' => 'Pamatlietotājs',
            'description' => 'Darbinieks ar pamatlietotāja tiesībām – iespējams ievadīt savas darba stundas un veiktās izmaksas.'));
        Role::create(array('id' => 2,
            'name' => 'Projektu vadītājs/ Grāmatvedis',
            'description' => 'Darbinieks ar projektu vadītāja/ grāmatveža tiesībām - iespējams apskatīt citu darbinieku ievadītās stundas un rediģēt projektu informāciju.'));
        Role::create(array('id' => 3,
            'name' => 'Administrators',
            'description' => 'Darbinieks ar administratora tiesībām – iespējams reģistrēt jaunus lietotājus, kā arī apskatīt, bloķēt/atbloķēt un dzēst esošos.'));
    }
}
