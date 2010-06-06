<?php

class FollowingsController extends AppController
{
	//--------------------------------------------------------------------------
	public function add()
	{
		if ( ! empty($this->data)) {
			
			$data = array(
				'user_id' => $this->Auth->user('id'),
				'friend_id' => $this->data['User']['id']
			);
			
			if ($this->Following->save($data)) {
				
				$this->Session->setFlash('Agora você segue');
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
						$this->Session->setFlash($error);
						break;
					}
				}
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			}
		}
	}
	
	
	//--------------------------------------------------------------------------
	public function delete()
	{
		if ( ! empty($this->data)) {
			
			$options = array(
				'conditions' => array(
					'Following.user_id' => $this->Auth->user('id'),
					'Following.friend_id' => $this->data['User']['id'],
				)
			);
			
			$friendship = $this->Following->find('first', $options);
			if ($friendship) {
				if ($this->Following->delete($friendship['Following']['id'])) {
					$this->Session->setFlash('Você não segue mais o usuário');
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

