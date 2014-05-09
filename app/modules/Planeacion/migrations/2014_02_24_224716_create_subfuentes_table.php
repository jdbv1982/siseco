<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubfuentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subfuentes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idfuente');
			$table->string('cvesubfuente')->nullable();
			$table->string('nombresubfuente')->nullable();
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
		Schema::drop('subfuentes');
	}

}
