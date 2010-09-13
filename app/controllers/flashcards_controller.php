<?php

class FlashcardsController extends AppController
{
    
    //--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa visualizar os flashcards
	 */
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow(array('index', 'view'));
	}
    
    
    //--------------------------------------------------------------------------
    public function index()
    {
        $this->paginate = array(
            'Flashcard' => array(
                'contain' => array('Owner')
            )
        );
        
        $flashcards = $this->paginate('Flashcard');
        $this->set('flashcards', $flashcards);
    }
    
    
    //--------------------------------------------------------------------------
    /**
     * Página de visualização de um flashcard
     */
    public function view($id = null)
    {
        $options = array(
            'conditions' => array(
                'Flashcard.id' => $id
            ),
            'contain' => array('Owner')
        );
        
        $flashcard = $this->Flashcard->find('first', $options);
        
        $this->set('flashcard', $flashcard);
    }
    
    
    //--------------------------------------------------------------------------
    /**
     * Página para a adição de flashcards
     */
    public function add()
    {
        if ( ! empty($this->data)) {
            $this->data['Flashcard']['user_id'] = $this->currentUser['id'];
            
            $this->Flashcard->save($this->data);
            $this->redirect(array('action' => 'index'));
        }
    }
    
    
    //--------------------------------------------------------------------------
    /**
     * Retorna os ultimos flashcards adicionados
     */
    public function getLatest($quantity = 5)
    {
        return $this->Flashcard->getLatest($quantity);
    }
}

