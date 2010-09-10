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
		// senha
		'password1' => array(
			'min' => array(
				'rule'		=> array('minLength', 6),
				'message'	=> 'A senha deve ter no mínimo 6 caracteres'
			)
		),
		// senha
		'password2' => array(
			'equal_password' => array(
				'rule'		=> array('equalPassword'),
				'message'	=> 'As senhas são diferentes'
			)
		)
	);
	
	
	//--------------------------------------------------------------------------
	public $hasMany = array(
		'Following',
		'Follower',
		'Membership',
		'UserMessage'
	);
	
	
	//--------------------------------------------------------------------------
	public function save($data)
	{
	    $ret = parent::save($data);
	    
	    if ($ret != false) {
	        $this->query("insert into users_total_views(user_id) values ({$this->id})");
	    }
	    
	    return $ret;
	}
	
	
	//--------------------------------------------------------------------------
	public function getById($user_id)
	{
		// Pega o usuário
		$options = array(
			'conditions' => array(
				'id' => $user_id
			)
		);
		
		return $this->find('first', $options);
	}
	
	
	public function getFollowersCount($user_id)
	{
	    // Pega o usuário
		$options = array(
			'conditions' => array(
				'user_id' => $user_id
			)
		);
		
		return $this->Follower->find('count', $options);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Lógica para saber se um usuário segue o outro.
	 * O usuário passado pelo parâmetro é o usuário da direita.
	 * O usuário atual (o do $this->id) é o que quer saber se segue o da direita
	 */
	public function follows($user_id = null)
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
	
	
	//--------------------------------------------------------------------------
	// Verifica se as duas senhas são iguais
	public function equalPassword($data)
	{
	    return $data['password2'] == $this->data['User']['password1'];
	}
}

