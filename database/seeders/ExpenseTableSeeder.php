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
                'project_id' => '8',
                'expense_report_id' => '1',
                'vendor'=> 'Kesko Senukai Latvia, AS',
                'document_number' => '123456789',
                'amount_euros' => '96.00',
                'expense_day' => '11',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Kārtridžu uzpilde biroja printeriem, 8gb.',
            ],
            [
                'user_id' => '1',
                'project_id' => '8',
                'expense_report_id' => '1',
                'vendor'=> 'Latvijas pasts, VAS',
                'document_number' => '987654321',
                'amount_euros' => '15.67',
                'expense_day' => '5',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Pasta pakalpojumi, rēķinu izsūtīšana klientiem par oktobri.',
            ],
            [
                'user_id' => '1',
                'project_id' => '8',
                'expense_report_id' => '1',
                'vendor'=> 'Amazon Europe Core SARL (Amazon.de)',
                'document_number' => '111-232323-1485000',
                'amount_euros' => '77.04',
                'expense_day' => '16',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Nozares grāmatas biroja bibliotēkai, 3gb.',
            ],
            [
                'user_id' => '2',
                'project_id' => '1',
                'expense_report_id' => '2',
                'vendor'=> 'Maxima Latvija, SIA',
                'document_number' => '1111111111',
                'amount_euros' => '40.12',
                'expense_day' => '2',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Izmaksas projekta svētku pasākumam.',
            ],
            [
                'user_id' => '2',
                'project_id' => '1',
                'expense_report_id' => '2',
                'vendor'=> 'Maxima Latvija, SIA',
                'document_number' => '22222222',
                'amount_euros' => '120.55',
                'expense_day' => '2',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Dāvanu izmaksas projekta komandas biedriem.',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'expense_report_id' => '2',
                'vendor'=> 'Latvijas Mobilais Telefons, SIA',
                'document_number' => '23333-2',
                'amount_euros' => '155.65',
                'expense_day' => '21',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Telefonu pieslēgumu rēķinu izmaksas par 2020.gada oktobri.',
            ],
            [
                'user_id' => '1',
                'project_id' => '1',
                'expense_report_id' => '2',
                'vendor'=> 'Bolt Services, SIA',
                'document_number' => 'AB1239876',
                'amount_euros' => '230.12',
                'expense_day' => '17',
                'expense_month' => 'Novembris',
                'expense_year' => '2020',
                'expense_description' => 'Taksometru pakalpojumu izmaksas par 2020.gada oktobri.',
            ],
        ]);
    }
}
