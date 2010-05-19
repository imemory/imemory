<?php

class Group extends AppModel
{
	
	//--------------------------------------------------------------------------
	public function getLatest($quantity = 12)
	{
		$options = array(
			'fields' => array('Group.id', 'Group.name', 'Group.description'),
			'order' => 'Group.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
}

