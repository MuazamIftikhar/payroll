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
            $table->string('user_id');
            $table->string('Factory');
            $table->string('ownerName');
            $table->string('Designation');
            $table->string('ownerMobile');
            $table->string('Pan');
            $table->string('ownerRemarks');
            $table->string('ownerEmail');
            $table->string('f_license_doccument')->nullable();
            $table->string('f_license_doa')->nullable();
            $table->string('f_license_doe')->nullable();
            $table->string('f_license_renewal')->nullable();
            $table->string('f_license_doc_upload')->nullable();
            $table->string('f_license_remarks')->nullable();
            $table->string('l_lic_doccument')->nullable();
            $table->string('l_lic_doa')->nullable();
            $table->string('l_lic_doe')->nullable();
            $table->string('l_lic_renewal')->nullable();
            $table->string('l_lic_doc_upload')->nullable();
            $table->string('l_lic_remarks')->nullable();
            $table->string('EPF_doccument')->nullable();
            $table->string('EPF_doa')->nullable();
            $table->string('EPF_doe')->nullable();
            $table->string('EPF_renewal')->nullable();
            $table->string('EPF_doc_upload')->nullable();
            $table->string('EPF_remarks')->nullable();
            $table->string('ESIC_doccument')->nullable();
            $table->string('ESIC_doa')->nullable();
            $table->string('ESIC_doe')->nullable();
            $table->string('ESIC_renewal')->nullable();
            $table->string('ESIC_doc_upload')->nullable();
            $table->string('ESIC_remarks')->nullable();
            $table->string('PAN_doccument')->nullable();
            $table->string('PAN_doa')->nullable();
            $table->string('PAN_doe')->nullable();
            $table->string('PAN_renewal')->nullable();
            $table->string('PAN_doc_upload')->nullable();
            $table->string('PAN_remarks')->nullable();
            $table->string('PT_EST_doccument')->nullable();
            $table->string('PT_EST_doa')->nullable();
            $table->string('PT_EST_doe')->nullable();
            $table->string('PT_EST_renewal')->nullable();
            $table->string('PT_EST_doc_upload')->nullable();
            $table->string('PT_EST_remarks')->nullable();
            $table->string('PT_EE_doccument')->nullable();
            $table->string('PT_EE_doa')->nullable();
            $table->string('PT_EE_doe')->nullable();
            $table->string('PT_EE_renewal')->nullable();
            $table->string('PT_EE_doc_upload')->nullable();
            $table->string('PT_EE_remarks')->nullable();
            $table->string('LWF_doccument')->nullable();
            $table->string('LWF_doa')->nullable();
            $table->string('LWF_doe')->nullable();
            $table->string('LWF_renewal')->nullable();
            $table->string('LWF_doc_upload')->nullable();
            $table->string('LWF_remarks')->nullable();
            $table->string('GST_doccument')->nullable();
            $table->string('GST_doa')->nullable();
            $table->string('GST_doe')->nullable();
            $table->string('GST_renewal')->nullable();
            $table->string('GST_doc_upload')->nullable();
            $table->string('GST_remarks')->nullable();
            $table->string('Digital_doccument')->nullable();
            $table->string('Digital_doa')->nullable();
            $table->string('Digital_doe')->nullable();
            $table->string('Digital_renewal')->nullable();
            $table->string('Digital_doc_upload')->nullable();
            $table->string('Digital_remarks')->nullable();
            $table->string('doccument_name')->nullable();
            $table->string('doccument')->nullable();
            $table->string('doa')->nullable();
            $table->string('doe')->nullable();
            $table->string('renewal')->nullable();
            $table->string('doc_upload')->nullable();
            $table->string('remarks')->nullable();
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
