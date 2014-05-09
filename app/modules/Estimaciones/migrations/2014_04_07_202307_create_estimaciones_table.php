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
			$table->string('pejecucion')->nullable();
			$table->integer('estatus')->nullable();
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
