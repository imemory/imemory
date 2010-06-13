<?php

class TagsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página das tags
	 */
	function beforeFilter() {
		$this->Auth->allow('index', 'getLatest');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Página inicial das tags. Mostra as tags como uma nuvem
	 */
	public function index()
	{
		$tags = $this->Tag->getAll();
		$this->set('tags', $tags);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Retorna as últimas tags cadastradas
	 */
	public function getLatest($quantity = 12)
	{
		return $this->Tag->getLatest($quantity);
	}
	
}

