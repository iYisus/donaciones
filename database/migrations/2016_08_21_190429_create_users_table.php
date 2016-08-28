<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('nombre');
			$table->string('apellido');
			$table->string('user_name');
			$table->string('email');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->integer('CEDULA');
			$table->string('USUARIO', 200)->nullable();
			$table->integer('FK_ROL_ID')->index('fk_usuario_rol');
			$table->integer('FK_ESTATUS_USUARIO_ID')->default(1)->index('fk_usuario_estatus');
			$table->integer('ESTATUS_REGISTRO')->unsigned()->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
