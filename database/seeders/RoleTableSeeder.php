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
                'id' => '3',
                'name' => 'ROLE_ADMIN',
                'description' => 'Darbinieks ar administratora tiesībām – iespējams reģistrēt jaunus lietotājus, kā arī apskatīt, bloķēt/atbloķēt un dzēst esošos.'
            ],
            [
                'id' => '2',
                'name' => 'ROLE_MANAGER',
                'description' => 'Darbinieks ar projektu vadītāja/ grāmatveža tiesībām - iespējams apskatīt citu darbinieku ievadītās stundas un rediģēt projektu informāciju.'
            ],
            [
                'id' => '1',
                'name' => 'ROLE_EMPLOYEE',
                'description' => 'Darbinieks ar pamatlietotāja tiesībām – iespējams ievadīt savas darba stundas un veiktās izmaksas.'
            ],
        ]);    
    }
}
