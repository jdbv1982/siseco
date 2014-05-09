<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->float('afisico')->nullable();
			$table->float('afinanciero')->nullable();
			$table->text('observaciones')->nullable();
			$table->string('foto1')->nullable();
			$table->string('foto2')->nullable();
			$table->string('foto3')->nullable();
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
		Schema::drop('avances');
	}

}
