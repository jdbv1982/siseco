<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarizacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendarizacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('conceptocal');
			$table->double('porcentaje')->nullable();
			$table->double('totalcal')->nullable();
			$table->double('enero')->nullable();
			$table->double('febrero')->nullable();
			$table->double('marzo')->nullable();
			$table->double('abril')->nullable();
			$table->double('mayo')->nullable();
			$table->double('junio')->nullable();
			$table->double('julio')->nullable();
			$table->double('agosto')->nullable();
			$table->double('septiembre')->nullable();
			$table->double('octubre')->nullable();
			$table->double('noviembre')->nullable();
			$table->double('diciembre')->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('calendarizacion');
	}

}
