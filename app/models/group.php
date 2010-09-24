<?php

class Group extends AppModel
{
	//--------------------------------------------------------------------------
    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
            // Name
            'name' => array(
                'valid_name' => array(
                    'rule'		=> 'notEmpty',
                    'message'	=> __d('valida', 'You must provide the group name.', true)
                )
            ),
            
            // Description
            'description' => array(
                'valid_description' => array(
                    'rule'		=> 'notEmpty',
                    'message'	=> __d('valida', 'You must provide the group description.', true)
                )
            )
        );
    }
    
    
	//--------------------------------------------------------------------------
	public $belongsTo = array(
		'Owner' => array(
			'className'  => 'User',
		),
	);
	
	
	//--------------------------------------------------------------------------
	public $hasMany = array('GroupMessage', 'Membership');
	
	
	//--------------------------------------------------------------------------
	public function getById($id)
	{
		$options = array(
			'contain' => 'Owner',
			'conditions' => array(
				'Group.id' => $id
			)
		);
		
		return $this->find('first', $options);
	}
	
	//--------------------------------------------------------------------------
	public function getLatest($quantity = 12)
	{
		$options = array(
			'fields' => array('Group.id', 'Group.name', 'Group.description'),
			'order' => 'Group.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
}

