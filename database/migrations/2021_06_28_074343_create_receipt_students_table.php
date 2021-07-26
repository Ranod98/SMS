<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptStudentsTable extends Migration
{

    public function up()
    {
        Schema::create('receipt_students', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('receipt_students');
    }
}
