<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planeacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ppi');
			$table->string('nombreppi');
			$table->integer('idregion');
			$table->integer('iddistrito');
			$table->integer('idmunicipio');
			$table->integer('idlocalidad');
			$table->integer('idprograma');
			$table->integer('idsubprograma');
			$table->integer('idtipo');
			$table->string('numeroobra');
			$table->text('nombreobra');
			$table->integer('idfuente')->nullable();
			$table->integer('idsubfuente')->nullable();
			$table->integer('idorigen')->nullable();
			$table->integer('idsuborigen')->nullable();
			$table->integer('idclassuborigen')->nullable();
			$table->integer('idcvefin')->nullable();
			$table->integer('ejercicio')->nullable();
			$table->integer('idramo')->nullable();
			$table->integer('idfondo')->nullable();
			$table->integer('idsituacion')->nullable();
			$table->string('depejecutora')->nullable();
			$table->string('nombreaccion')->nullable();
			$table->integer('idunidadmedida')->nullable();
			$table->integer('idmeta')->nullable();
			$table->float('cantidad')->nullable();
			$table->integer('idpoblacion')->nullable();
			$table->integer('total')->nullable();
			$table->integer('bmujeres')->nullable();
			$table->integer('bhombres')->nullable();
			$table->integer('bjornales')->nullable();
			$table->text('caracteristicas')->nullable();
			$table->integer('idmodalidad')->nullable();
			$table->text('comentarios')->nullable();
			$table->text('concejecutar')->nullable();
			$table->text('observaciones')->nullable();
			$table->string('codigoaccion')->nullable();
			$table->text('observacionesseg')->nullable();
			$table->integer('ninforme')->nullable();
			$table->integer('idfgeneral');
			$table->integer('idresidencia')-nullable();
			$table->integer('idclasseguimiento')-nullable();
			$table->integer('idsubclasseguimiento')-nullable();

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
		Schema::drop('planeacion');
	}

}
