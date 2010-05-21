<?php

class UsersController extends AppController
{
	
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
}

