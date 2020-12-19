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
                'id' => '1',
                'role_name' => 'ROLE_EMPLOYEE',
                'role_title'=> 'Pamatlietotājs',
                'role_description' => 'Darbinieks ar pamatlietotāja tiesībām – iespējams ievadīt savas darba stundas un veiktās izmaksas.'
            ],
            [
                'id' => '2',
                'role_name' => 'ROLE_MANAGER',
                'role_title'=> 'Projektu vadītājs',
                'role_description' => 'Darbinieks ar projektu vadītāja/ grāmatveža tiesībām - iespējams apskatīt citu darbinieku ievadītās stundas un rediģēt projektu informāciju.'
            ],
            [
                'id' => '3',
                'role_name' => 'ROLE_ADMIN',
                'role_title'=> 'Administrators',
                'role_description' => 'Darbinieks ar administratora tiesībām – iespējams reģistrēt jaunus lietotājus, kā arī apskatīt, bloķēt/atbloķēt un dzēst esošos.'
            ],
        ]);    
    }
}
