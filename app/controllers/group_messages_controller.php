<?php

class GroupMessagesController extends AppController
{
	
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
