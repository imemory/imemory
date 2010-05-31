<?php

class Group extends AppModel
{
	
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'Owner' => array(
			'className'  => 'User',
		),
	);
	
	
	//--------------------------------------------------------------------------
	public $hasMany = array('GroupMessage');
	
	
	//--------------------------------------------------------------------------
	public $hasAndBelongsToMany = array(
		'Users' => array(
			'className'  => 'User',
			'joinTable'  => 'memberships',
			'foreignKey' => 'group_id',
			'unique'     => true,
		),
	);
	
	
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

