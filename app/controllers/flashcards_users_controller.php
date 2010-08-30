<?php

class FlashcardsUsersController extends AppController
{
    
    function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow(array('index', 'view'));
	}    
    
    public function index()
    {
        $flashcards = $this->FlashcardsUser->find('all');
    }
    
    public function add($flashcard_id = null) {
        $user_id = $this->currentUser['id'];
        
        if ( ! empty($this->data)) {
            $flashcard_id = $this->data['Flashcard']['id'];
        }
        
        echo $flashcard_id;
        
        $data = array(
            'flashcard_id' => $flashcard_id,
            'user_id'      => $user_id
        );
        
        if (! $this->FlashcardsUser->find('first', array('conditions' => $data))) {
            if ($this->FlashcardsUser->save($data)) {
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
}

