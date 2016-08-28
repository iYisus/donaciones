<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMedicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('medicos', function(Blueprint $table)
		{
			$table->foreign('FK_ESPECIALIDAD_ID', 'fk_especialidad_medio')->references('ID')->on('especialidad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('FK_ESTATUS_MEDICOS_ID', 'fk_estatus_medico_id')->references('ID')->on('estatus_medicos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('medicos', function(Blueprint $table)
		{
			$table->dropForeign('fk_especialidad_medio');
			$table->dropForeign('fk_estatus_medico_id');
		});
	}

}
