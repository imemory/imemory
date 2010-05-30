<?php

class ContactController extends AppController
{
	//--------------------------------------------------------------------------
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa entrar em contato
	 */
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
	}
}

