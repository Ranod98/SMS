<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('from_grade')->constrained('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('from_classroom')->constrained('class_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('from_section')->constrained('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->string('from_year');

            $table->foreignId('to_grade')->constrained('genders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to_classroom')->constrained('class_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to_section')->constrained('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->string('to_year');
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
        Schema::dropIfExists('promotions');
    }
}
