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
	public $hasMany = array('GroupMessage', 'Membership');
	
	
	//--------------------------------------------------------------------------
	public function getById($id)
	{
		$options = array(
			'contain' => array(
				'GroupMessage' => array(
					'User' => array(
						'fields' => array('User.id', 'User.username')
					),
					'order' => array('GroupMessage.id desc'),
					'limit' => 5
				),
				'Owner'
			),
			'conditions' => array(
				'Group.id' => $id
			)
		);
		
		$options = array(
			'contain' => 'Owner',
			'conditions' => array(
				'Group.id' => $id
			)
		);
		
		return $this->find('first', $options);
	}
	
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

