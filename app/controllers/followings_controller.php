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
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			
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
}

