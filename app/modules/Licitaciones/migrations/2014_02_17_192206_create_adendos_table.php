<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdendosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adendos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('nombreadendo');
			$table->text('descadendo')->nullable();
			$table->text('obsadendo')->nullable();
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
		Schema::drop('adendos');
	}

}
