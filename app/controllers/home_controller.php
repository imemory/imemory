<?php

class HomeController extends AppController
{
	//--------------------------------------------------------------------------
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
	}
	
}
