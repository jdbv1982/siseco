<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanciamientoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('financiamiento', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idclasificacion');
			$table->string('cvefinanciamiento')->nullable();
			$table->string('nombrefinanciamiento')->nullable();
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
		Schema::drop('financiamiento');
	}

}
