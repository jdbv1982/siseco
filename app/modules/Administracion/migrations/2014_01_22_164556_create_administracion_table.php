<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministracionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idobra');
			$table->string('clc', 100);
			$table->date('felab')->nullable();
			$table->date('frecp')->nullable();
			$table->string('numfactura',100)->nullable();
			$table->text('concepto')->nullable();
			$table->string('fianza', 100)->nullable();
			$table->string('spei', 100)->nullable();
			$table->double('ministrado')->nullable();
			$table->double('porc5')->nullable();
			$table->double('porc2')->nullable();
			$table->double('radicado')->nullable();
			$table->string('orden', 100)->nullable();
			$table->string('numcheque', 100)->nullable();
			$table->date('fcheque')->nullable();
			$table->double('montopagado')->nullable();
			$table->double('amort_cred_pte')->nullable();
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
		Schema::drop('administracion');
	}

}
