<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuborigenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suborigen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idorigen')->nullable();
			$table->string('cvesuborigen')->nullable();
			$table->string('nombresuborigen')->nullable();
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
		Schema::drop('suborigen');
	}

}
