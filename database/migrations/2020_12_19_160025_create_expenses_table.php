<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('expense_report_id')->nullable()->unsigned();
            $table->string('vendor', 255);
            $table->string('document_number', 120);
            $table->decimal('amount_euros', 15, 2);
            $table->integer('expense_day')->unsigned();
            $table->string('expense_month', 20)->unsigned();
            $table->integer('expense_year')->unsigned();
            $table->longText('expense_description');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('expense_report_id')->references('id')->on('expense_report');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
