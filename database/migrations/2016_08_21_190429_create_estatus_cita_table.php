<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstatusCitaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estatus_cita', function(Blueprint $table)
		{
			$table->integer('ID');
			$table->string('DESCRIPCION', 50);
			$table->integer('ESTATUS_REGISTRO');
			$table->primary(['ID','ESTATUS_REGISTRO']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estatus_cita');
	}

}
