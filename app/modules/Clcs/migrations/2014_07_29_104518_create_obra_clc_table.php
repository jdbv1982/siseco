<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObraClcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obra_clc', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('idobra');
			$table->string('no_afectacion',25);
			$table->text('concepto');
			$table->integer('id_status');

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
		Schema::drop('obra_clc');
	}

}
