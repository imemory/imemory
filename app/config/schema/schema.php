<?php 

class AppSchema extends CakeSchema
{
	public $name = 'App';
	
	public function before($event = array()) {
		return true;
	}
	
	public function after($event = array()) {
	}
	
	public $states = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
		'code' => array('type' => 'string', 'null' => false),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);
	
	public $cities = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'state_id' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'string', 'null' => false),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);
	
	public $groups = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'owner_id' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'string', 'null' => false),
		'description' => array('type' => 'text', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => true),
		'updated' => array('type' => 'datetime', 'null' => true),
		'indexes' => array(
			'PRIMARY'		=> array('unique' => true, 'column' => 'id'),
			'groups_unq'	=> array('unique' => true, 'column' => array('owner_id', 'name'))
		),
		'tableParameters' => array()
	);
	
	public $group_messages = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => true),
		'user_id' => array('type' => 'integer', 'null' => true),
		'message' => array('type' => 'text', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);
	
	public $profiles = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true),
		'first_name' => array('type' => 'string', 'null' => false),
		'last_name' => array('type' => 'string', 'null' => false),
		'gender' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'birthday' => array('type' => 'date', 'null' => true),
		'indexes' => array(
			'PRIMARY'			=> array('unique' => true, 'column' => 'id'),
			'profiles_user_unq'	=> array('unique' => true, 'column' => 'user_id')
		),
		'tableParameters' => array()
	);
	
	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false),
		'email' => array('type' => 'string', 'null' => false),
		'password' => array('type' => 'string', 'null' => false),
		'confirmed' => array('type' => 'boolean', 'null' => false, 'default' => 'false'),
		'blocked' => array('type' => 'boolean', 'null' => false, 'default' => 'false'),
		'created' => array('type' => 'datetime', 'null' => true),
		'updated' => array('type' => 'datetime', 'null' => true),
		'indexes' => array(
			'PRIMARY'				=> array('unique' => true, 'column' => 'id'),
			'users_email_key'		=> array('unique' => true, 'column' => 'email'),
			'users_username_key'	=> array('unique' => true, 'column' => 'username')
		),
		'tableParameters' => array()
	);
	
	public $user_messages = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true),
		'from_id' => array('type' => 'integer', 'null' => true),
		'message' => array('type' => 'text', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);
	
	// Relacionamentos
	
	public $memberships = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => true),
		'user_id' => array('type' => 'integer', 'null' => true),
		'created' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);
}

