<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('email');
			$table->string('password');
			$table->integer('idPerfil');
			$table->integer('status');
			$table->timestamps();
		});

		DB::table('users')->insert(
            array(
                'nombre' => 'Jesus David Barranco Velasco',
                'email'	=> 'jdbardav@gmail.com',
                'password' => Hash::make('admin'),
                'idPerfil' => 5,
                'status'	=> 1,
                'created_at' => '01/01/2014',
                'updated_at' => '01/01/2014'
            )
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
