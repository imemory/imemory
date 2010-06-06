<?php

class MembershipsController extends AppController
{
	//--------------------------------------------------------------------------
	public function add()
	{
		if ( ! empty($this->data)) {
			$this->data['Membership']['user_id'] = $this->Auth->user('id');
			
			if ($membership = $this->Membership->save($this->data['Membership'])) {
				$this->Session->setFlash('Entrado com sucesso no grupo');
				$this->redirect(array(
					'controller' => 'groups',
					'action' => 'view',
					$this->data['Membership']['group_id']
				));
			} else {
				
				foreach($this->Membership->validationErrors as $error) {
					$this->Session->setFlash($error);
					break;
				}
				
				$this->redirect(array('controller' => 'home'));
			}
		}
	}
	
	//--------------------------------------------------------------------------
	public function delete()
	{
		if ( ! empty($this->data)) {
			
			$options = array(
				'conditions' => array(
					'Membership.user_id' => $this->Auth->user('id'),
					'Membership.group_id' => $this->data['Membership']['group_id'],
				)
			);
			
			$membership = $this->Membership->find('first', $options);
			
			if ($membership) {
				if ($this->Membership->delete($membership['Membership']['id'])) {
					$this->Session->setFlash('Você saiu do grupo');
					$this->redirect(array(
						'controller' => 'groups',
						'action' => 'view',
						$membership['Membership']['group_id']
					));
				}
			}
		}
	}
	
}

