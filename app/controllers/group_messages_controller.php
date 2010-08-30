<?php

class GroupMessagesController extends AppController
{
	
	//--------------------------------------------------------------------------
	public function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('view');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Visualiza as mensagens de um grupo
	 * TODO: Talvez seja melhor colocar essa lógica no controller do grupo
	 */
	public function view($group_id = null) {
		$this->paginate = array(
			'condition' => array(
				'GroupMessage.group_id' => $group_id
			),
			'contain' => array(
				'Group' => array(
					'fields' => array('Group.id', 'Group.name')
				),
				'User' => array(
					'fields' => array('User.id', 'User.username')
				)
			),
			'limit' => 10
		);
		
		$group = $this->GroupMessage->Group->find(
			'first',
			array('conditions' => array('id' => $group_id))
		);
		
		$this->set('group', $group);
		
		$this->set('messages', $this->paginate());
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Envia uma nova mensagem para o grupo
	 * Redirecionar para a página correta
	 */
	public function add()
	{
		if ( ! empty($this->data)) {
			$this->data['GroupMessage']['user_id'] = $this->currentUser['id'];
			
			if ($this->GroupMessage->save($this->data)) {
				$this->Session->setFlash('Mensagem enviada');
				$this->redirect(array(
				    'controller' => 'groups',
				    'action' => 'view',
				    $this->data['GroupMessage']['group_id']
                ));
			}
		}
	}
}


