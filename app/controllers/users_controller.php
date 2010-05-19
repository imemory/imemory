<?php

class UsersController extends AppController
{
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$latest_users = $this->User->getLatest();
		$this->set('latest_users', $latest_users);
	}
	
}

