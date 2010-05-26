<?php

class Membership extends AppModel
{
	
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'Group' => array(
			'className'  => 'Group',
			'counterCache' => true
		),
		
		'User' => array(
			'className'  => 'User',
		),
	);
}

