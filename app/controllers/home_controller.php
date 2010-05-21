<?php

class HomeController extends AppController
{
	//--------------------------------------------------------------------------
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
	}
	
}
