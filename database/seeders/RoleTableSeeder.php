<?php

namespace Database\Seeders;

// use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Pamatlietotājs',
                'description' => 'Darbinieks ar pamatlietotāja tiesībām – iespējams ievadīt savas darba stundas un veiktās izmaksas.'
            ],
            [
                'name' => 'Projektu vadītājs/ Grāmatvedis',
                'description' => 'Darbinieks ar projektu vadītāja/ grāmatveža tiesībām - iespējams apskatīt citu darbinieku ievadītās stundas un rediģēt projektu informāciju.'
            ],
            [
                'name' => 'Administrators',
                'description' => 'Darbinieks ar administratora tiesībām – iespējams reģistrēt jaunus lietotājus, kā arī apskatīt, bloķēt/atbloķēt un dzēst esošos.'
            ]
        ]);
    }
}
