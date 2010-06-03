<?php

class GroupMessagesController extends AppController
{
	
	//--------------------------------------------------------------------------
	public function beforeFilter() {
		$this->Auth->allow('view');
	}
	
	
	//--------------------------------------------------------------------------
	public function view($group_id = null) {
		$this->paginate = array(
			'condition' => array(
				'GroupMessage.group_id' => $group_id
			),
			'contain' => array(
				'Group' => array(
					'fields' => array('Group.id')
				),
				'User' => array(
					'fields' => array('User.id', 'User.username')
				)
			),
			'limit' => 10
		);
		
		$this->set('messages', $this->paginate());
	}
	
	//--------------------------------------------------------------------------
	public function add()
	{
		if ( ! empty($this->data)) {
			
			$this->data['GroupMessage']['user_id'] = $this->Auth->user('id');
			
			if ($this->GroupMessage->save($this->data)) {
				$this->Session->setFlash('Mensagem enviada');
				$this->redirect(array('controller' => 'home'));
			}
		}
	}
}
