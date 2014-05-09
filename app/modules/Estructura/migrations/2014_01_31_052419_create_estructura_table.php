<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstructuraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estructura', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('concepto')->nullable();
			$table->double('total')->nullable();
			$table->double('invfederal')->nullable();
			$table->double('investatal')->nullable();
			$table->double('invmunicipal')->nullable();			
			$table->double('invparticipantes')->nullable();			
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
		Schema::drop('estructura');
	}

}
