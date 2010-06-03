<?php

class UserMessage extends AppModel
{
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'From' => array(
			'className' => 'User',
			'foreignKey' => 'from_id'
		),
		'User'
	);
}
