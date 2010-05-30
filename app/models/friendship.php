<?php

class Friendship extends AppModel
{	
	//--------------------------------------------------------------------------
	public $validate = array(
		'user_id' => array(
			'unique' => array(
				'rule'		=> array('unique'),
				'message'	=> 'Você já adicionou este usuário.'
			),
			'notSame' => array(
				'rule'		=> array('notSame'),
				'message'	=> 'Você não pode seguir você mesmo.'
			),
		),
	);
	
	
	//--------------------------------------------------------------------------
	public function unique()
	{
		$data = $this->data['Followings'];
		$count = $this->find('count', array('conditions' => $data));
		
		return $count < 0;
	}
	
	
	//--------------------------------------------------------------------------
	public function notSame()
	{
		return $this->data['Followings']['user_id'] != $this->data['Followings']['friend_id'];
	}
}

