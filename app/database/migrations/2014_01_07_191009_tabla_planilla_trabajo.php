<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPlanillaTrabajo extends Migration {

	public function up() {
		Schema::create('planilla_trabajo', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
	        $table->double('sueldo')->nullable();
	        $table->dateTime('ingreso')->nullable();
	        $table->dateTime('salida')->nullable();
	        $table->timestamps();
		});
	}

	public function down() {
		Schema::drop("planilla_trabajo");
	}

}