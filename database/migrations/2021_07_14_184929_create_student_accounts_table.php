<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->foreignId('fee_invoice_id')->nullable()->constrained('fee_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreignId('processing_fee_id')->nullable()->references('id')->on('processing_fees')->onDelete('cascade');
            $table->foreignId('payment_student_id')->nullable()->references('id')->on('payment_students')->onDelete('cascade');

            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('student_accounts');
    }
}
