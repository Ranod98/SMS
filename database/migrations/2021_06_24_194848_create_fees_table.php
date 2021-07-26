<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->decimal('amount',8,2);
            $table->string('fee_type');
            $table->foreignId('grade_id')->constrained('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->constrained('class_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('description')->nullable();

            $table->string('year');
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
        Schema::dropIfExists('fees');
    }
}
