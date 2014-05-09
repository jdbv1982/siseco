<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoprogramaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipoprogramas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cveprograma')->nullable();
			$table->string('cvetipo',3)->nullable();
			$table->string('nombretipo')->nullable();
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
		Schema::drop('tipoprogramas');
	}

}
