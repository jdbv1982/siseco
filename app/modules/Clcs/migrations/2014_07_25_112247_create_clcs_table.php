<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clcs', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('no_afectacion',25);
			$table->string('no_control', 25);
			$table->string('cve_presupuestal',180);
			$table->text('descripcion');
			$table->string('referencia',150);
			$table->date('fecha_ref');
			$table->string('proveedor');
			$table->string('rfc',15);
			$table->double('importe');
			$table->double('iva');
			$table->double('total');
			$table->string('signo',1);

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
		Schema::drop('clcs');
	}

}
