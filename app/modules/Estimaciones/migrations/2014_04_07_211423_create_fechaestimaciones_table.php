<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaestimacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fechaestimaciones', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->date('fecha1')->nullable();
			$table->date('fecha2')->nullable();
			$table->date('fecha3')->nullable();
			$table->date('fecha4')->nullable();
			$table->date('fecha5')->nullable();
			$table->date('fecha6')->nullable();
			$table->date('fecha7')->nullable();
			$table->date('fecha8')->nullable();
			$table->date('fecha9')->nullable();
			$table->date('fecha10')->nullable();
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
		Schema::drop('fechaestimaciones');
	}

}
