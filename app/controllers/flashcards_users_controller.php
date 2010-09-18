<?php

class FlashcardsUsersController extends AppController
{
    //--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa visualizar os flashcards
	 */
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow(array('getWhoStoodOut'));
	}
	
	
    //--------------------------------------------------------------------------
	/**
	 *
	 * Inicia os estudos retornando o próximo flashcard que deve ser estudado
	 *
	 */
	public function study()
	{
	    $this->set(
	        'flashcard',
	        $this->FlashcardsUser->getNextFlashcard($this->currentUser['id'])
        );
	}
	
	
    //--------------------------------------------------------------------------
    /**
     * Adiciona o flashcard para o usuário logado atualmente
     */
    public function add($flashcard_id = null) {
        
        $user_id = $this->currentUser['id'];
        
        if ( ! empty($this->data)) {
            $flashcard_id = $this->data['Flashcard']['id'];
        }
        
        $data = array(
            'flashcard_id' => $flashcard_id,
            'user_id'      => $user_id
        );
        
        if (! $this->FlashcardsUser->find('first', array('conditions' => $data))) {
            if ($this->FlashcardsUser->save($data)) {
                
                $this->Log->logFlashcardAdded($flashcard_id);
                
                $this->flashOk(__('Flashcard successfully added.', true));
            }
        }
        
        $this->redirect(
            array(
			    'controller' => 'flashcards',
			    'action' => 'view',
			    $flashcard_id
		    )
        );
    }
    
    
    //--------------------------------------------------------------------------
	/**
	 *
	 * O usuário não se lembra do flashcard
	 *
	 */
	public function no_hit($id = null)
    {
        $this->FlashcardsUser->noHit($id);
        
        // Redireciona para o próximo estudo
        $this->redirect(array('action' => 'study'));
    }
    
    
    //--------------------------------------------------------------------------
	/**
	 *
	 * O usuário se lembra do flashcard (deu um hit)
	 *
	 */
    public function hit($id = null)
    {
        $this->FlashcardsUser->hit($id);
        $this->redirect(array('action' => 'study'));
    }
    
    
    //--------------------------------------------------------------------------
	/**
	 *
	 * Retorna os usuário que estudaram mais
	 *
	 */
    public function getWhoStoodOut($quantity = 10) {
        return $this->FlashcardsUser->getWhoStoodOut($quantity);
    }
}

