<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSugerenciaComentarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sugerencia_comentario', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->integer('TIPO_REGISTRO');
			$table->string('DESCRIPCION', 800);
			$table->integer('FK_ESTATUS_SUGERENCIA_COMENTARIO_ID')->default(1)->index('fk_sugerencia_comentario_estatus');
			$table->integer('FK_USUARIO_ID')->nullable()->index('fk_sugerencia_comentario_usuario');
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
		Schema::drop('sugerencia_comentario');
	}

}
