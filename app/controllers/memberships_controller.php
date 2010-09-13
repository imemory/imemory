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
				$this->flashOk(__('Entrado com sucesso no grupo', true));
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
					$this->flashError(__('Você saiu do grupo', true));
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

