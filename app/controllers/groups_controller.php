<?php

class GroupsController extends AppController
{
	//--------------------------------------------------------------------------
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$latest_groups = $this->Group->getLatest();
		$this->set('latest_groups', $latest_groups);
	}
	
	
	//--------------------------------------------------------------------------
	public function view($id)
	{
		$group = $this->Group->findById($id);
		
		$this->set('group', $group);
	}
}
