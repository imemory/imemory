<?php

class TagsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página das tags
	 */
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('index', 'view', 'getLatest');
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
	 * Visualiza os flashcards usando a tag
	 */
	public function view($id)
	{
	    $options = array(
	        'contain'    => array(
	            'FlashcardsTag' => array(
	                'Flashcard' => array(
	                    'Owner'
	                )
	            )
            ),
	        'conditions' => array(
	            'Tag.id' => $id
	        )
	    );
	    
		$tag = $this->Tag->find('first', $options);
		$this->set('tag', $tag);
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

