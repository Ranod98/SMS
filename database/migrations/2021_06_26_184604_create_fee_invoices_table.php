<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->decimal('amount',8,2);

            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grade_id')->constrained('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('class_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fee_id')->constrained('fees')->onUpdate('cascade')->onDelete('cascade');

            $table->string('description')->nullable();
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
        Schema::dropIfExists('fee_invoices');
    }
}
