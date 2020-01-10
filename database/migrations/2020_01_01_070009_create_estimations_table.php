<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estName');
            $table->string('Factory');
            $table->string('Pin');
            $table->string('City');
            $table->string('District');
            $table->string('State');
            $table->string('Phone');
            $table->string('Name');
            $table->string('Mobile');
            $table->string('Email');
            $table->string('Pan');
            $table->string('Type');
            $table->string('natureOfBusiness');
            $table->string('ownershipType');
            $table->string('ownerName');
            $table->string('ownerAdd');
            $table->string('ownerMobile');
            $table->string('ownerEmail');
            $table->string('invoicePeriod');
            $table->string('f_license_doccument');
            $table->string('f_license_doa');
            $table->string('f_license_doe');
            $table->string('f_license_renewal');
            $table->string('f_license_doc_upload');
            $table->string('f_license_remarks');
            $table->string('l_lic_doccument');
            $table->string('l_lic_doa');
            $table->string('l_lic_doe');
            $table->string('l_lic_renewal');
            $table->string('l_lic_doc_upload');
            $table->string('l_lic_remarks');
            $table->string('EPF_doccument');
            $table->string('EPF_doa');
            $table->string('EPF_doe');
            $table->string('EPF_renewal');
            $table->string('EPF_doc_upload');
            $table->string('EPF_remarks');
            $table->string('ESIC_doccument');
            $table->string('ESIC_doa');
            $table->string('ESIC_doe');
            $table->string('ESIC_renewal');
            $table->string('ESIC_doc_upload');
            $table->string('ESIC_remarks');
            $table->string('PAN_doccument');
            $table->string('PAN_doa');
            $table->string('PAN_doe');
            $table->string('PAN_renewal');
            $table->string('PAN_doc_upload');
            $table->string('PAN_remarks');
            $table->string('PT_EST_doccument');
            $table->string('PT_EST_doa');
            $table->string('PT_EST_doe');
            $table->string('PT_EST_renewal');
            $table->string('PT_EST_doc_upload');
            $table->string('PT_EST_remarks');
            $table->string('PT_EE_doccument');
            $table->string('PT_EE_doa');
            $table->string('PT_EE_doe');
            $table->string('PT_EE_renewal');
            $table->string('PT_EE_doc_upload');
            $table->string('PT_EE_remarks');
            $table->string('LWF_doccument');
            $table->string('LWF_doa');
            $table->string('LWF_doe');
            $table->string('LWF_renewal');
            $table->string('LWF_doc_upload');
            $table->string('LWF_remarks');
            $table->string('GST_doccument');
            $table->string('GST_doa');
            $table->string('GST_doe');
            $table->string('GST_renewal');
            $table->string('GST_doc_upload');
            $table->string('GST_remarks');
            $table->string('Digital_doccument');
            $table->string('Digital_doa');
            $table->string('Digital_doe');
            $table->string('Digital_renewal');
            $table->string('Digital_doc_upload');
            $table->string('Digital_remarks');
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
        Schema::dropIfExists('estimations');
    }
}
