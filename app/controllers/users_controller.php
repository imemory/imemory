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

