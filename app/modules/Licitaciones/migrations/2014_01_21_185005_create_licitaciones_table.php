<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicitacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('licitaciones', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('l_procedimiento')->nullable();
			$table->string('l_contrato')->nullable();
			$table->double('l_montocontratado')->nullable();
			$table->double('l_anticipo')->nullable();
			$table->date('l_fecha')->nullable();
			$table->integer('l_ndias')->nullable();
			$table->date('l_finicio')->nullable();
			$table->date('l_ffinal')->nullable();
			$table->integer('l_idempresa')->nullable();
			$table->integer('l_tipoemp')->nullable();
			$table->integer('l_origen')->nullable();
			$table->integer('l_cmic')->nullable();
			$table->string('l_modcontrato')->nullable();
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
		Schema::drop('licitaciones');
	}

}
