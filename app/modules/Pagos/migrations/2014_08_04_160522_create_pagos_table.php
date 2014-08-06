<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('clc_id');
			$table->string('folio',50);
			$table->string('beneficiario');
			$table->text('observaciones');
			$table->integer('ejercicio_id');
			$table->integer('banco_id');
			$table->integer('cuenta_id');
			$table->text('concepto');
			$table->double('deducciones');
			$table->double('aditivas');
			$table->double('importe');
			$table->double('total');

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
		Schema::drop('pagos');
	}

}
