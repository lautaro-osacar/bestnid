<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tarjeta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_propietario');
			$table->string('numero',16)->unique();
			$table->integer('codigo');
			$table->date('vencimiento');
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
		Schema::drop('tarjeta');
	}

}
