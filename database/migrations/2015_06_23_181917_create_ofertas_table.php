<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ofertas', function(Blueprint $table)
		{
			$table->increments('id');
			//--Claves foraneas
			$table->integer('subasta_id')->unsigned();
			$table->foreign('subasta_id')->references('id')->on('subastas');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			//--
			$table->float('monto');
			$table->longtext('necesidad');
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
		Schema::drop('ofertas');
	}

}
