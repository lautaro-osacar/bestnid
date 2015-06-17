<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('apellido');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('domicilio');
			$table->integer('tarjeta_id')->unsigned();
			$table->integer('ciudad_id')->unsigned();
			
			$table->rememberToken();
			$table->timestamps();
			
		});

		Schema::table('users', function($table) {
      		$table->foreign('tarjeta_id')->references('id')->on('tarjeta');
      		$table->foreign('ciudad_id')->references('id')->on('ciudad');
  		});
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
