<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notificaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idremitente');
			$table->integer('iddestino');
			$table->string('titulo')->nullable();
			$table->text('mensaje')->nullable();
			$table->integer('estado')->default(1);
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
		Schema::drop('notificaciones');
	}

}
