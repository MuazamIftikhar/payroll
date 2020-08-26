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
            $table->string('joining');
            $table->string('ending');
            $table->string('Gender');
            $table->string('Religion');
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('streetAddress');
            $table->string('City');
            $table->string('State');
            $table->string('zipCode');
            $table->string('District');
            $table->string('per_District');
            $table->string('per_streetAddress');
            $table->string('per_City');
            $table->string('per_State');
            $table->string('per_zipCode');
            $table->string('Designation');
            $table->string('company_id');
            $table->string('Status');
            $table->string('bankName')->nullable();
            $table->string('accountNumber')->nullable();
            $table->string('ISFC')->nullable();
            $table->string('checkBook')->nullable();
            $table->string('esicNumber')->nullable();
            $table->string('UAN')->nullable();
            $table->string('esicFlag');
            $table->string('PTFlag');
            $table->string('LWFFlag');
            $table->string('PFSaturating');
            $table->string('PFFlag');
            $table->string('NameAsAdhar');
            $table->string('adharNumber');
            $table->string('adharProof')->nullable();
            $table->string('NameAsPan')->nullable();
            $table->string('panNumber')->nullable();
            $table->string('panProof')->nullable();
            $table->string('family_firstName');
            $table->string('family_lastName');
            $table->string('family_Relation');
            $table->string('family_presentAddress');
            $table->string('familyPresentDistrict');
            $table->string('familyPresentState');
            $table->string('family_permanentAddress');
            $table->string('familyPermanentDistrict');
            $table->string('familyPermanentState');
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
