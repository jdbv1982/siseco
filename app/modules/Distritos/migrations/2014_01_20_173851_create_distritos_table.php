<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistritosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distritos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idRegion');
			$table->string('clave_distrito', 3)->nullable();
			$table->string('nombre', 100);
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
		Schema::drop('distritos');
	}

}
