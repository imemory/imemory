<?php

class FlashcardsUsersController extends AppController
{
    
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
                
                $this->Session->setFlash('flashcard adicionado.');
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
}

