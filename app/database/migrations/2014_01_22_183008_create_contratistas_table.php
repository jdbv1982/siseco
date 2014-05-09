<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratistasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contratistas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero');
			$table->string('rfc');
			$table->string('razsoc');
			$table->string('domicilio');
			$table->string('repleg');
			$table->string('telefonos');
			$table->string('correo');
			$table->string('celular');
			$table->integer('tipoid');
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
		Schema::drop('contratistas');
	}

}
