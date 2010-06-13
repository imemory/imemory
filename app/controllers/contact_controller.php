<?php

class ContactController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Não utiliza conexão com o banco de dados
	 */
	public $uses = array();
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa entrar em contato
	 */
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Página principal contendo a explicação de como entrar em contato conosco
	 * e o formulário para enviar mensagens.
	 */
	public function index()
	{
	}
}

