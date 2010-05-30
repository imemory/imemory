<?php

class Membership extends AppModel
{
	//--------------------------------------------------------------------------
	public $validate = array(
		'user_id' => array(
			'unique' => array(
				'rule'		=> array('unique'),
				'message'	=> 'Você já está participando deste grupo.'
			)
		),
	);
	
	
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
	
	public function unique()
	{
		$data = $this->data['Membership'];
		$count = $this->find('count', array('conditions' => $data));
		
		return $count < 0;
	}
}

