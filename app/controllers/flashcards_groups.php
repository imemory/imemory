<?php

class FlashcardsGroupsController extends AppController
{
    //--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa visualizar os flashcards
	 */
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('*');
	}
}

