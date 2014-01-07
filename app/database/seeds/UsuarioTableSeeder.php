<?php

class UsuarioTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		DB::table('usuario')->delete();
		
		Usuario::create( array(
			'usu_login' => 'admin',
			'usu_password' => Hash::make('admin'),
			'usu_password' => Hash::make('admin'),
			'usu_rol' => 4
		));
		Usuario::create( array(
			'usu_login' => 'ubaldino',
			'usu_password' => Hash::make('ubaldino')
		));
		Usuario::create( array(
			'usu_login' => 'rodrigo',
			'usu_password' => Hash::make('rodrigo'),
			'usu_rol' => 1
		));
		
	}

}