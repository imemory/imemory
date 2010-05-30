<?php

class TagsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página das tags
	 */
	function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$tags = $this->Tag->getAll();
		$this->set('tags', $tags);
	}
	
}

