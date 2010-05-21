<?php

class UsersController extends AppController
{
	//--------------------------------------------------------------------------
	function beforeFilter() {
		$this->Auth->allow('index', 'view', 'signup');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$latest_users = $this->User->getLatest();
		$this->set('latest_users', $latest_users);
	}
	
	
	//--------------------------------------------------------------------------
	public function view($id = null)
	{
		$user = $this->User->read(null, $id);
		
		if ( ! $user) {
			$this->Session->setFlash('Usuário não encontrado');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$this->set('user', $user);
	}
	
	
	//--------------------------------------------------------------------------
	public function follow()
	{
		$friend_id = $this->data['User']['id'];
		$current_user = $this->Auth->user('id');
		
		if ($friend_id == $current_user) {
			$this->Session->setFlash('Você não pode seguir você mesmo');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$friend = $this->User->read(null, $friend_id);
		
		if ( ! $friend) {
			$this->Session->setFlash('Usuário não encontrado');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$data = array(
			'user_id' => $this->Auth->user('id'),
			'friend_id' => $friend['User']['id'],
		);
		
		if ($this->User->Followings->save($data)) {
			$this->Session->setFlash('Agora você segue ' . $friend['User']['username']);
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}
	
	
	//--------------------------------------------------------------------------
	public function signup()
	{
		if ( ! empty($this->data)) {
			
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Usuário cadastrado');
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			}
		}
	}
	
	
	//--------------------------------------------------------------------------
	public function login()
	{}
	
	
	//--------------------------------------------------------------------------
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
}

