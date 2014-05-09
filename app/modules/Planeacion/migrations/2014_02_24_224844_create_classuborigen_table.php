<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassuborigenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classuborigen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idsuborigen');
			$table->string('cveclasificacion')->nullable();
			$table->string('nombreclasificacion')->nullable();
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
		Schema::drop('classuborigen');
	}

}
