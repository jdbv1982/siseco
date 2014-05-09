<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obras', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->integer('poa');
			$table->integer('idevento');
			$table->text('observaciones');
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
		Schema::drop('obras');
	}

}
