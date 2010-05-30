<?php

class GroupMessage extends AppModel
{
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'User' => array(
			'className'  => 'User',
		),
	);
}
