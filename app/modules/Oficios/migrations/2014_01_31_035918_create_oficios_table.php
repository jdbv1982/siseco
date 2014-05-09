<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oficios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('nombreoficio');
			$table->string('numerooficio');
			$table->date('fechaoficio')->nullable();
			$table->date('fecharecibido')->nullable();
			$table->date('observacionesoficio')->nullable();
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
		Schema::drop('oficios');
	}

}
