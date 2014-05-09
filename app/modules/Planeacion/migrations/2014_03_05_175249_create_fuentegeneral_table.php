<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuentegeneralTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fuentegeneral', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cvefuentegeneral')->nullable();
			$table->string('fuentegeneral')->nullable();
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
		Schema::drop('fuentegeneral');
	}

}
