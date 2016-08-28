<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEspecialidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('especialidad', function(Blueprint $table)
		{
			$table->foreign('FK_ESTATUS_ESPECIALIDAD_ID', 'fk_especialidad_estatus')->references('ID')->on('estatus_especialidad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('especialidad', function(Blueprint $table)
		{
			$table->dropForeign('fk_especialidad_estatus');
		});
	}

}
