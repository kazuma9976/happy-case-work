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
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->text('emergency_contact')->nullable();
            $table->text('emergency_contact_address')->nullable();
            $table->text('family_hospital')->nullable();
            $table->string('disease_name')->nullable();
            $table->text('clinical_history')->nullable();
            $table->text('medical_history')->nullable(); 
            $table->text('life_history')->nullable();
            $table->text('family_structure')->nullable();
            $table->text('academic_background')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('economic_condition')->nullable();
            $table->text('related_organization')->nullable(); 
            $table->text('welfare_service')->nullable();
            $table->string('image')->nullable();
            $table->text('consideration')->nullable();
            $table->text('other')->nullable();
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
