<?php

class Follower extends AppModel
{
	//--------------------------------------------------------------------------
	public $useTable = 'friendships';
	
	
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'friend_id'
		),
		'Friend' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
}

