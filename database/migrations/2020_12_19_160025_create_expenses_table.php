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
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('expense_report_id')->unsigned();
            $table->string('vendor', 255)->nullable();
            $table->string('document_number', 120)->nullable();
            $table->decimal('amount_euros', 15, 2);
            $table->integer('expense_day')->nullable();
            $table->string('expense_month', 20)->nullable();
            $table->integer('expense_year')->nullable();
            $table->longText('expense_description');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('project_id')->references('id')->on('projects')->onCascade('delete');
            $table->foreign('expense_report_id')->references('id')->on('expense_report')->onCascade('delete');
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
