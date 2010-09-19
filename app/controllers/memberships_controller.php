<?php

class MembershipsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Adiciona um usuário no grupo
	 */
	public function add()
	{
		if ( ! empty($this->data)) {
			$this->data['Membership']['user_id'] = $this->currentUser['id'];
			
			if ($membership = $this->Membership->save($this->data['Membership'])) {
			    
			    // Loga a ação
			    $this->Log->logMembership(1);
			    
			    
				$this->flashOk(__("Now you're part of the group.", true));
				$this->redirect(array(
					'controller' => 'groups',
					'action' => 'view',
					$this->data['Membership']['group_id']
				));
			} else {
				
				foreach($this->Membership->validationErrors as $error) {
					$this->flashError($error);
					break;
				}
				
				$this->redirect(array('controller' => 'home'));
			}
		}
	}
	
	//--------------------------------------------------------------------------
	/**
	 * Remove um usuário do grupo
	 */
	public function delete()
	{
		if ( ! empty($this->data)) {
			
			$options = array(
				'conditions' => array(
					'Membership.user_id' => $this->currentUser['id'],
					'Membership.group_id' => $this->data['Membership']['group_id'],
				)
			);
			
			$membership = $this->Membership->find('first', $options);
			
			if ($membership) {
				if ($this->Membership->delete($membership['Membership']['id'])) {
					$this->flashError(__('You left the group.', true));
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

