<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentas', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('ejercicio_id');
			$table->integer('banco_id');
			$table->string('che_no');
			$table->string('cuenta_no');
			$table->string('nombre');
			$table->string('clabe');

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
		Schema::drop('cuentas');
	}

}
