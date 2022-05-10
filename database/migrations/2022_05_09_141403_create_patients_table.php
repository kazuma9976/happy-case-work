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
            $table->string('postal_code');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->text('emergency_contact');
            $table->text('family_hospital');
            $table->string('disease_name');
            $table->text('clinical_history');
            $table->text('medical_history'); 
            $table->text('life_history');
            $table->text('family_structure');
            $table->text('academic_background');
            $table->text('work_experience');
            $table->text('economic_condition');
            $table->text('related_organization'); 
            $table->text('welfare_service');
            $table->string('image');
            $table->text('consideration');
            $table->text('other');
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
