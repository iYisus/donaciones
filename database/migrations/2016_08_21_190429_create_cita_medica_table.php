<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitaMedicaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cita_medica', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->string('NOMBRE_PACIENTE', 50);
			$table->string('APELLIDO_PACIENTE', 50);
			$table->string('EDAD_PACIENTE', 3)->nullable();
			$table->dateTime('FECHA_CITA');
			$table->integer('FK_ESPECIALIDAD_ID')->index('fk_especialidad_cita');
			$table->integer('FK_MEDICO_ID')->index('fk_medico_cita');
			$table->integer('FK_ESTATUS_CITA_ID')->default(1)->index('fk_estatus_cita');
			$table->integer('ESTATUS_REGISTRO')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cita_medica');
	}

}
