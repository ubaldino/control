<?php

class AdminController extends BaseController {

	public function __construct(){
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');

    }

	public function panel(){
		return View::make( 'admin.panel' );
	}

}