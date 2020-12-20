<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            [
                'user_id' => '1',
                'project_id' => '1',
                'vendor'=> 'Kesko Senukai Latvia, AS',
                'document_number' => '#123456789',
                'amount_euros' => '96.00',
                'expense_date' => '2020-11-22',
                'description' => 'Kārtridžu uzpilde biroja printeriem, 8gb.',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'vendor'=> 'Latvijas pasts, VAS',
                'document_number' => '#987654321',
                'amount_euros' => '15.67',
                'expense_date' => '2020-11-05',
                'description' => 'Pasta pakalpojumi, rēķinu izsūtīšana klientiem par oktobri.',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'vendor'=> 'Amazon Europe Core SARL (Amazon.de)',
                'document_number' => '#111-232323-1485000',
                'amount_euros' => '77.04',
                'expense_date' => '2020-11-16',
                'description' => 'Nozares grāmatas biroja bibliotēkai, 3gb.',
            ],
            [
                'user_id' => '2',
                'project_id' => '2',
                'vendor'=> 'Maxima Latvija, SIA',
                'document_number' => '#1111111111',
                'amount_euros' => '40.12',
                'expense_date' => '2020-11-02',
                'description' => 'Izmaksas projekta svētku pasākumam.',
            ],
            [
                'user_id' => '2',
                'project_id' => '2',
                'vendor'=> 'Maxima Latvija, SIA',
                'document_number' => '#22222222',
                'amount_euros' => '120.55',
                'expense_date' => '2020-11-02',
                'description' => 'Dāvanu izmaksas projekta komandas biedriem.',
            ],
        ]);
    }
}
