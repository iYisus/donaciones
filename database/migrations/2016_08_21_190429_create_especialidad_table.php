<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEspecialidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('especialidad', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->string('ESPECIALIDAD', 100);
			$table->integer('FK_ESTATUS_ESPECIALIDAD_ID')->default(1)->index('fk_especialidad_estatus');
			$table->integer('ESTATUS_REGISTRO');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('especialidad');
	}

}
