<?php

class Friendship extends AppModel
{
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
	
	
	public function unique()
	{
		$data = $this->data['Followings'];
		$count = $this->find('count', array('conditions' => $data));
		
		if ($count > 0) {
			return false;
		}
		
		return true;
	}
	
	public function notSame()
	{
		if ($this->data['Followings']['user_id'] == $this->data['Followings']['friend_id']) {
			return false;
		}
		
		return true;
	}
}

