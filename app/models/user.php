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
				'message'	=> 'Este apelido já está sendo usado
								por outra pessoa.'
			),
		),
		// Email
		'email' => array(
			'valid_email' => array(
				'rule'		=> array('email', false),
				'message'	=> 'Seu e-mail não parece ser válido.
								Tente novamente'
			),
			'email_unique' => array(
				'rule'		=> 'isUnique',
				'message'	=> 'Este e-mail já está sendo
								usado por outra pessoa.'
			),
		),
	);
	
	
	//--------------------------------------------------------------------------
	public $hasMany = array(
		'Following',
		'Follower',
		'Membership',
		'UserMessage'
	);
	
	
	//--------------------------------------------------------------------------
	public function getById($user_id)
	{
		// Pega o usuário
		$options = array(
			'contain' => array(
				'Following' => array('Friend'),
				'UserMessage' => array('From'),
			)
		);
		
		$user = $this->find('first', $options);
		
		
		// Query para retornar o numero de followings
		$options = array('conditions' => array(
			'user_id' => $user_id
		));
		
		$following_count = $this->Following->find('count', $options);
		$user['User']['following_count'] = $following_count;
		
		// Query para retornar o numero de followers
		$options = array('conditions' => array(
			'user_id' => $user_id
		));
		
		$follower_count = $this->Follower->find('count', $options);
		$user['User']['follower_count'] = $follower_count;
		
		return $user;
	}
	
	
	//--------------------------------------------------------------------------
	public function isFollower($user_id = null)
	{
		$options = array(
			'conditions' => array(
				'Following.user_id' => $this->id,
				'Following.friend_id' => $user_id,
			)
		);
		
		$count = $this->Following->find('count', $options);
		
		return $count > 0;
	}
	
	
	//--------------------------------------------------------------------------
	public function getLatest($quantity = 12)
	{
		$options = array(
			'fields' => array('User.id', 'User.username', 'User.email'),
			'order' => 'User.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
	
	
	//--------------------------------------------------------------------------
	//TODO: Substituir por código real
	public function getTopContributors($quantity = 12)
	{
		$options = array(
			'fields' => array('User.id', 'User.username', 'User.email'),
			'order' => 'User.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
	
	
	//--------------------------------------------------------------------------
	//TODO: Substituir por código real
	public function getPopular($quantity = 12)
	{
		$options = array(
			'fields' => array('User.id', 'User.username', 'User.email'),
			'order' => 'User.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
}

