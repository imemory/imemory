<?php

class GroupMessage extends AppModel
{
	//--------------------------------------------------------------------------
	public $belongsTo = array('Group', 'User');
	
	
	public function getByGroupId($group_id = null)
	{
		$options = array(
			'contain' => array(
				'User' => array(
					'fields' => array('User.id', 'User.username')
				)
			),
			'conditions' => array(
				'GroupMessage.group_id' => $group_id,
			),
			'limit' => 5
		);
		
		return $this->find('all', $options);
	}
}
