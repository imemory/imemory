<?php

class Following extends AppModel
{
	//--------------------------------------------------------------------------
	public $useTable = 'friendships';
	
	
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
	public $belongsTo = array(
		'Friend' => array(
			'className' => 'User',
			'foreignKey' => 'friend_id',
			'counterCache' => true
		),
		'User'
	);
	
	
	//--------------------------------------------------------------------------
	public function unique()
	{
		$data = $this->data['Following'];
		$count = $this->find('count', array('conditions' => $data));
		return $count <= 0;
	}
	
	
	//--------------------------------------------------------------------------
	public function notSame()
	{
		return $this->data['Following']['user_id'] != $this->data['Following']['friend_id'];
	}
}

