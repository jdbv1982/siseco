<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubclasseguimientoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subclasseguimiento', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idclasificador')->nullable();
			$table->string('nombre');
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
		Schema::drop('subclasseguimiento');
	}

}
