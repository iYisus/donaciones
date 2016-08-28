<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->string('NOMBRE_EVENTO', 500);
			$table->string('DESCRIPCION', 800);
			$table->dateTime('FECHA_INICIO');
			$table->dateTime('FECHA_FIN')->nullable();
			$table->integer('FK_ESTATUS_EVENTO_ID')->default(1)->index('fk_evento_estatus');
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
		Schema::drop('eventos');
	}

}
