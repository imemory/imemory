<?php

class Following extends AppModel
{
    //--------------------------------------------------------------------------
    public $useTable = 'friendships';
    
    
    //--------------------------------------------------------------------------
    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
            'user_id' => array(
                    'unique' => array(
                    'rule'		=> array('unique'),
                    'message'	=> __d('valida', 'Você já adicionou este usuário.', true)
                ),
                'notSame' => array(
                    'rule'		=> array('notSame'),
                    'message'	=> __d('valida', 'Você não pode seguir você mesmo.', true)
                ),
            ),
        );
    }
	
	
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

