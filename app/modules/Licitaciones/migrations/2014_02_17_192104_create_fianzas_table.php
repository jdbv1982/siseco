<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFianzasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fianzas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('numfianza')->nullable();
			$table->double('montofianza')->nullable();
			$table->integer('idafianzadora');
			$table->date('fechafianza')->nullable();
			$table->integer('tipofianza');
			$table->string('numfactura')->nullable();
			$table->double('montofactura')->nullable();
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
		Schema::drop('fianzas');
	}

}
