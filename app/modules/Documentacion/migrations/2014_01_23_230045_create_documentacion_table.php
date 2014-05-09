<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('d_nombredoc');
			$table->string('d_urldoc');
			$table->integer('id_usuario');
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
		Schema::drop('documentacion');
	}

}
