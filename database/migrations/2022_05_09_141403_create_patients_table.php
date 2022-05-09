<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('birthday');
            $table->string('gender');
            $table->string('postal_code', 7);
            $table->string('address');
            $table->string('phone_number', 11);
            $table->string('email');
            $table->string('emergency_contact');
            $table->string('family_hospital');
            $table->string('disease_name');
            $table->string('clinical_history');
            $table->string('medical_history'); 
            $table->string('life_history');
            $table->string('family_structure');
            $table->string('academic_background');
            $table->string('work_experience');
            $table->string('economic_condition');
            $table->string('related_organization'); 
            $table->string('welfare_service');
            $table->string('image');
            $table->string('consideration');
            $table->string('other');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
