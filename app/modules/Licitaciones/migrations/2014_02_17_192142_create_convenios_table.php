<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convenios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('numconvenio');
			$table->date('fechaconvenio');
			$table->integer('tipoconvenio');
			$table->double('cantidad')->nullable();
			$table->date('finicio')->nullable();
			$table->date('ffinal')->nullable();
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
		Schema::drop('convenios');
	}

}
