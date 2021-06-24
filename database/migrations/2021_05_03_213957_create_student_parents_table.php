<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_passport_id');
            $table->string('father_phone');
            $table->string('father_job');
            $table->foreignId('nationality_id_father')->constrained('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('blood_type_id_father')->constrained('blood_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('religion_id_father')->constrained('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('father_address');



            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_passport_id');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->foreignId('nationality_id_mother')->constrained('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('blood_type_id_mother')->constrained('blood_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('religion_id_mother')->constrained('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('mother_address');


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
        Schema::dropIfExists('student_parents');
    }
}
