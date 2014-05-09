<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('origenes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idsubfuente');
			$table->string('cveorigen')->nullable();
			$table->string('nombreorigen')->nullable();
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
		Schema::drop('origenes');
	}

}
