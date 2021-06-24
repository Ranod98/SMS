<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->id();
			$table->string('name', 72);
			$table->foreignId('class_id')->constrained('class_rooms')->onUpdate('cascade')->onDelete('cascade');
			$table->string('status', 10);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}
