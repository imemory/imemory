<?php

class Membership extends AppModel
{
	
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'Group' => array(
			'className'  => 'Group',
		),
		
		'User' => array(
			'className'  => 'User',
		),
	);
}

