<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estimaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('nombre')->nullable();
			$table->integer('numrevision')->nullable();
			$table->integer('numestimacion')->nullable();
			$table->date('festimacion')->nullable();
			$table->text('observacion')->nullable();
			$table->date('fdevolucion')->nullable();
			$table->double('importe')->nullable();
			$table->date('finicio_est')->nullable();
			$table->date('ftermino_est')->nullable();
			$table->integer('estatus')->nullable();
			$table->text('recibido_por')->nullable();
			$table->text('nombreobra_ori')->nullable();

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
		Schema::drop('estimaciones');
	}

}
