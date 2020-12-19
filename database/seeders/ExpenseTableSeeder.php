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
                'amount_euros' => '96.00',
                'seller'=> 'Kesko Senukai Latvia, AS',
                'document_number' => '#123456789',
                'description' => 'Kārtridžu uzpilde biroja printeriem, 8gb.',
                'expense_date' => '2020-11-22',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'amount_euros' => '15.67',
                'seller'=> 'Latvijas pasts, VAS',
                'document_number' => '#987654321',
                'description' => 'Pasta pakalpojumi, rēķinu izsūtīšana klientiem par oktobri.',
                'expense_date' => '2020-11-05',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'amount_euros' => '77.04',
                'seller'=> 'Amazon Europe Core SARL (Amazon.de)',
                'document_number' => '#111-232323-1485000',
                'description' => 'Nozares grāmatas biroja bibliotēkai, 3gb.',
                'expense_date' => '2020-11-16',
            ],
            [
                'user_id' => '2',
                'project_id' => '2',
                'amount_euros' => '40.12',
                'seller'=> 'Maxima Latvija, SIA',
                'document_number' => '#1111111111',
                'description' => 'Izmaksas projekta svētku pasākumam.',
                'expense_date' => '2020-11-02',
            ],
            [
                'user_id' => '2',
                'project_id' => '2',
                'amount_euros' => '120.55',
                'seller'=> 'Maxima Latvija, SIA',
                'document_number' => '#22222222',
                'description' => 'Dāvanu izmaksas projekta komandas biedriem.',
                'expense_date' => '2020-11-02',
            ],
        ]);
    }
}
