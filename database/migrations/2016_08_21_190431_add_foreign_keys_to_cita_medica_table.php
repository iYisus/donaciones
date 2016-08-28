<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCitaMedicaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cita_medica', function(Blueprint $table)
		{
			$table->foreign('FK_ESPECIALIDAD_ID', 'fk_especialidad_cita')->references('ID')->on('especialidad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('FK_ESTATUS_CITA_ID', 'fk_estatus_cita')->references('ID')->on('estatus_cita')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('FK_MEDICO_ID', 'fk_medico_cita')->references('ID')->on('medicos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cita_medica', function(Blueprint $table)
		{
			$table->dropForeign('fk_especialidad_cita');
			$table->dropForeign('fk_estatus_cita');
			$table->dropForeign('fk_medico_cita');
		});
	}

}
