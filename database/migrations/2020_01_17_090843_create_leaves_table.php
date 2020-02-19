<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('OB_PL');
            $table->string('OB_SL');
            $table->string('OB_CL');
            $table->string('D_PL');
            $table->string('D_SL');
            $table->string('D_CL');
            $table->string('CB_PL');
            $table->string('CB_SL');
            $table->string('CB_CL');
            $table->string('E_PL');
            $table->string('E_SL');
            $table->string('E_CL');
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
        Schema::dropIfExists('leaves');
    }
}
