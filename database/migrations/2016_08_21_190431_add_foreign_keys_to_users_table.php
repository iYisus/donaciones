<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('FK_ESTATUS_USUARIO_ID', 'fk_usuario_estatus')->references('ID')->on('estatus_usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('FK_ROL_ID', 'fk_usuario_rol')->references('ID')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('fk_usuario_estatus');
			$table->dropForeign('fk_usuario_rol');
		});
	}

}
