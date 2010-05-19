<?php

class GroupsController extends AppController
{
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$latest_groups = $this->Group->getLatest();
		$this->set('latest_groups', $latest_groups);
	}
	
}
