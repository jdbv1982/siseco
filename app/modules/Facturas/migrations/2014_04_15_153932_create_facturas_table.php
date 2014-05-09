<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idestimacion');
			$table->string('folio')->nullable();
			$table->date('fechaexp')->nullable();
			$table->double('subtotal')->nullable();
			$table->double('amtzxant')->nullable();
			$table->double('liquido')->nullable();
			$table->date('finieje')->nullable();
			$table->date('ffineje')->nullable();
			$table->text('observaciones')->nullable();
			$table->integer('idusuario')->nullable();
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
		Schema::drop('facturas');
	}

}
