<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaUsuario extends Migration {

	public function up() {
		Schema::create('usuario', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
	        $table->string('usu_nombres')->nullable();
	        $table->string('usu_apellido_paterno')->nullable();
	        $table->string('usu_apellido_materno')->nullable();
	        $table->string('usu_genero',10)->nullable();
	        $table->string('usu_login');
	        $table->string('usu_password');
	        $table->string('usu_direccion')->nullable();
	        $table->string('usu_celular')->nullable();
	        $table->string('usu_telefono')->nullable();
	        $table->integer('usu_rol')->nullable();
	        $table->timestamps();	
		});
	}

	public function down() {
		Schema::drop("usuario");
	}

}