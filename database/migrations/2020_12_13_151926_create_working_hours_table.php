<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();

            // iekšā project_id => projekts, iekš tā attiecīgi date => datums, working-hours => stundas
            // uzņemt info pa kolonnām (pa projektam)
            $table->json('working_hours');
            // tāpēc neesmu pārliecināta, vai šis drīkst te atrasties
            $table->integer('project_id')->unsigned();

            $table->string('timesheet_month, 20');
            $table->integer('timesheet_year');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('project_id')->references('id')->on('projects')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_hours');
    }
}
