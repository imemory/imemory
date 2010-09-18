<?php

class FollowingsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Segue um usuário
	 * 
	 * Pega o usuário logado atualmente e o usuário enviado via
	 * post.
	 *
	 * O Usuário logado segue o usuário que ele pediu pra seguir
	 */
	public function add()
	{
		if ( ! empty($this->data)) {
			
			$data = array(
				'user_id' => $this->currentUser['id'],
				'friend_id' => $this->data['User']['id']
			);
			
			if ($this->Following->save($data)) {
				
				$this->flashOk(__('Agora você segue este usuário', true));
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'view',
					$this->data['User']['id']
				));
			
			} else {
				if ( isset($this->Following->validationErrors) &&
					! empty($this->Following->validationErrors))
				{
					foreach($this->Following->validationErrors as $error) {
						$this->flashError($error);
						break;
					}
				}
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			}
		}
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Para de seguir um usuário
	 */
	public function delete()
	{
		if ( ! empty($this->data)) {
			
			$options = array(
				'conditions' => array(
					'Following.user_id' => $this->currentUser['id'],
					'Following.friend_id' => $this->data['User']['id'],
				)
			);
			
			$friendship = $this->Following->find('first', $options);
			if ($friendship) {
				if ($this->Following->delete($friendship['Following']['id'])) {
					$this->flashOk(__('Você não segue mais este usuário', true));
					$this->redirect(array(
						'controller' => 'users',
						'action' => 'view',
						$this->data['User']['id']
					));
				}
			}
		}
	}
}

