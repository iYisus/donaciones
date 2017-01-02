<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSugerenciaComentarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sugerencia_comentario', function(Blueprint $table)
		{
			$table->foreign('FK_ESTATUS_SUGERENCIA_COMENTARIO_ID', 'fk_sugerencia_comentario_estatus')->references('ID')->on('estatus_sugerencia_comentario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('FK_USUARIO_ID', 'fk_sugerencia_comentario_usuario')->references('ID_USUARIO')->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sugerencia_comentario', function(Blueprint $table)
		{
			$table->dropForeign('fk_sugerencia_comentario_estatus');
			$table->dropForeign('fk_sugerencia_comentario_usuario');
		});
	}

}
