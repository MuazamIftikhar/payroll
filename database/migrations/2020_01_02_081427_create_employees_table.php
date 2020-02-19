<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('fatherName');
            $table->string('lastName');
            $table->string('DOB');
            $table->string('DOJ');
            $table->string('DOE');
            $table->string('Gender');
            $table->string('Religion');
            $table->string('Phone');
            $table->string('Email');
            $table->string('streetAddress');
            $table->string('City');
            $table->string('State');
            $table->string('zipCode');
            $table->string('per_streetAddress');
            $table->string('per_City');
            $table->string('per_State');
            $table->string('per_zipCode');
            $table->string('Designation');
            $table->string('company_id');
            $table->string('Status');
            $table->string('bankName');
            $table->string('accountNumber');
            $table->string('ISFC');
            $table->string('checkBook');
            $table->string('esicNumber');
            $table->string('UAN');
            $table->string('esicFlag');
            $table->string('PTFlag');
            $table->string('PFSaturating');
            $table->string('PFFlag');
            $table->string('NameAsAdhar');
            $table->string('adharNumber');
            $table->string('adharProof');
            $table->string('NameAsPan');
            $table->string('panNumber');
            $table->string('panProof');
            $table->string('family_firstName');
            $table->string('family_lastName');
            $table->string('family_Relation');
            $table->string('family_presentAddress');
            $table->string('family_permanentAddress');
            $table->string('family_Nominee');
            $table->string('family_DOB');
            $table->string('family_adharNumber');
            $table->string('Witness');
            $table->string('witnessAddress');
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
        Schema::dropIfExists('employees');
    }
}
