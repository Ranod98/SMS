<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassRoomsTable extends Migration {

	public function up()
	{
		Schema::create('class_rooms', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->bigInteger('Grade_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('class_rooms');
	}
}
