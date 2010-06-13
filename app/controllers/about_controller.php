<?php

class AboutController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Não utiliza conexão com o banco de dados
	 */
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página sobre o projeto
	 */
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Página principal falando sobre o projeto
	 */
	public function index()
	{
	}
}
