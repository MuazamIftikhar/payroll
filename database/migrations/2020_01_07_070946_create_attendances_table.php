<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('assignDay');
            $table->string('Month');;
            $table->string('PR_Day');
            $table->string('PL');
            $table->string('SL');
            $table->string('CL');
            $table->string('PH');
            $table->string('Total');
            $table->string('Advance');
            $table->string('Loan');
            $table->string('Deduction');
            $table->string('OT');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
