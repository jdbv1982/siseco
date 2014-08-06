<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caja', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('no_cheque');
			$table->date('fecha');
			$table->string('beneficiario');
			$table->double('importe');
			$table->text('concepto');
			$table->string('recibido_por');
			$table->integer('orden_id');

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
		Schema::drop('caja');
	}

}
