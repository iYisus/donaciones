<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstatusEventoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estatus_evento', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->string('DESCRIPCION', 50);
			$table->integer('ESTATUS_REGISTRO')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estatus_evento');
	}

}
