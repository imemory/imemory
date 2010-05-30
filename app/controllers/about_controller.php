<?php

class AboutController extends AppController
{
	//--------------------------------------------------------------------------
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página sobre o projeto
	 */
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
	}
}
