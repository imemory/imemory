<?php

class User extends AppModel
{
	//--------------------------------------------------------------------------
	public $validate = array(
		// Username
		'username' => array(
			'valid_regexp' => array(
				'rule'		=> '/^[a-z0-9_-]{4,15}$/i',
				'message'	=> 'Use apenas letras, números, "-" e underlines.
								O apelido deve ter no mínimo 4 caracteres.'
			),
			'username_unique' => array(
				'rule'		=> 'isUnique',
				'message'	=> 'Este apelido já está sendo usado por outra pessoa.'
			),
		),
		// Email
		'email' => array(
			'valid_email' => array(
				'rule'		=> array('email', false),
				'message'	=> 'Seu e-mail não parece ser válido. Tente novamente'
			),
			'email_unique' => array(
				'rule'		=> 'isUnique',
				'message'	=> 'Este e-mail já está sendo usado por outra pessoa.'
			),
		),
	);
	
	
	//--------------------------------------------------------------------------
	public $hasMany = array(
		'Messages' => array(
			'className'  => 'UserMessage',
		),
		
		'Followings' => array(
			'className'  => 'Friendship',
			'foreignKey' => 'user_id',
		),
		
		'Followers' => array(
			'className'  => 'Friendship',
			'foreignKey' => 'friend_id',
		),
	);
	
	
	//--------------------------------------------------------------------------
	public function getLatest($quantity = 12)
	{
		$options = array(
			'fields' => array('User.username', 'User.email'),
			'order' => 'User.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
}

