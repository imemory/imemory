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
	    
		$this->Auth->allow(array('index', 'view', 'getLatest', 'getTopContributors'));
	}
    
    
    //--------------------------------------------------------------------------
    public function index()
    {
        // Caso o usuário tenha pedido para adicionar flashcards
        if ( ! empty($this->data)) {
            
            // Verifica se o usuário está logado
            if (! $this->currentUser) {
                $this->flashError(__('Ops! You must be logged in to do this.', true));
                $this->redirect(array('action' => 'index'));
            }
            
            if (isset($this->data['action'])) {
                if ($this->data['action'] == 'add_user') {
                    $this->addToUser($this->data['Flashcard']);
                } else {
                    $this->addToGroup($this->data['Flashcard'], $this->data['Group']['id']);
                }
            }
        }
        
        // Executa o index normalmente
        $this->paginate = array(
            'Flashcard' => array(
                'contain' => array('Owner')
            ),
            'limit' => 25
        );
        
        // Pega os grupos do usuário se ele estiver logado
        if ($this->currentUser) {
            $lista = array();
            $options['conditions'] = array('Membership.user_id' => $this->currentUser['id']);
            $options['contain'] = array('Group');
            $groups = $this->Flashcard->Owner->Membership->find('all', $options);
            foreach($groups as $group) {
                $lista[$group['Group']['id']] = $group['Group']['name'];
            }
            
            $groups = $lista;
            $this->set('groups', $groups);
        }
        
        $flashcards = $this->paginate('Flashcard');
        $this->set('flashcards', $flashcards);
    }
    
    
    // Adiciona flashcards para o usuário
    public function addToUser($flashcards)
    {
        // Verifica se existe flashcards para adicionar
        $tem = false;
        foreach($flashcards as $id) {
            $tem = ($tem || ((bool) $id));
        }
        
        if (! $tem) {
            $this->flashError(__('Você precisa selecionar alguns flashcards.', true));
            $this->redirect(array('action' => 'index'));
        }
        
        // Lógica para adicionar
        
        $user_id = $this->currentUser['id'];
        
        // para cada flashcard mostrado
        foreach($flashcards as $id => $include) {
            
            // Se deve incluir
            if ($include) {
                
                // constroi a tupla
                $data = array(
                    'flashcard_id' => $id,
                    'user_id'      => $user_id
                );
                
                // Se o usuário não já possuir o flashcard
                if (! $this->Flashcard->FlashcardsUser->find('first', array('conditions' => $data))) {
                    // Reseta o model FlashcardsUser
                    $this->Flashcard->FlashcardsUser->create();
                    
                    // Se conseguiu salvar o flashcard
                    if ($this->Flashcard->FlashcardsUser->save($data)) {
                        // Loga a ação
                        $this->Log->logFlashcardAdded($id);
                    }
                }
            }
        }
        
        $this->flashOk('Flashcards adicionado com sucesso');
        $this->redirect(array('action' => 'index'));
    }
    
    
    public function addToGroup($flashcards, $group_id = null)
    {
        // Verifica se existe flashcards para adicionar
        $tem = false;
        foreach($flashcards as $id) {
            $tem = ($tem || ((bool) $id));
        }
        
        if (! $tem) {
            $this->flashError(__('Você precisa selecionar alguns flashcards.', true));
            $this->redirect(array('action' => 'index'));
        }
        
        // Lógica para adicionar
        
        $user_id = $this->currentUser['id'];
        
        $add = array();
        foreach($flashcards as $id => $include) {
            if ($include) {
                // constroi a tupla
                $data = array(
                    'flashcard_id' => $id,
                    'group_id'     => $group_id,
                    'user_id'      => $user_id
                );
                
                // Se o usuário não já possuir o flashcard
                if (! $this->Flashcard->FlashcardsGroup->find('first', array('conditions' => $data))) {
                    // Reseta o model FlashcardsUser
                    $this->Flashcard->FlashcardsGroup->create();
                    
                    // Se conseguiu salvar o flashcard
                    if ($this->Flashcard->FlashcardsGroup->save($data)) {
                        // Loga a ação
                        $this->Log->logFlashcardAdded($id);
                    }
                }
            }
        }
        
        $this->flashOk('Flashcards adicionado com sucesso');
        $this->redirect(array('action' => 'index'));
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
            
            $result = $this->Flashcard->save($this->data);
            
            if($result) {
                $this->flashOk('Flashcard adicionado com sucesso');
                $this->redirect(array('action' => 'add'));
            }
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
    
    
    //--------------------------------------------------------------------------
    /**
     * Retorna os estudantes que mais contribuiram
     */
    public function getTopContributors($quantity = 5)
    {
        return $this->Flashcard->getTopContributors($quantity);
    }
}

