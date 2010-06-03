<?php

class GroupMessage extends AppModel
{
	//--------------------------------------------------------------------------
	public $belongsTo = array('Group', 'User');
}
