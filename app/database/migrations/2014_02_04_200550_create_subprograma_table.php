<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubprogramaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subprogramas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cveprograma',3)->nullable();
			$table->string('cvesubprograma')->nullable();
			$table->string('nombresubprograma')->nullable();
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
		Schema::drop('subprogramas');
	}

}
