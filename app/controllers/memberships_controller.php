<?php

class MembershipsController extends AppController
{
	//--------------------------------------------------------------------------
	public function add()
	{
		if ( ! empty($this->data)) {
			$this->data['Membership']['user_id'] = $this->Auth->user('id');
			
			if ($this->Membership->save($this->data)) {
				$this->Session->setFlash('Entrado com sucesso no grupo');
				$this->redirect(array('controller' => 'home'));
			} else {
				
				foreach($this->Membership->validationErrors as $error) {
					$this->Session->setFlash($error);
					break;
				}
				
				$this->redirect(array('controller' => 'home'));
			}
		}
	}
	
}

