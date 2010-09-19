<?php

class Membership extends AppModel
{
    //--------------------------------------------------------------------------
    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
    		'user_id' => array(
	    		'unique' => array(
	    			'rule'		=> array('unique'),
	    			'message'	=> __d('valida', 'Você já está participando deste grupo.', true)
	    		)
	    	),
    	);
    }
	
	
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
	
	
	//--------------------------------------------------------------------------
	public function unique()
	{
		$data = $this->data['Membership'];
		$count = $this->find('count', array('conditions' => $data));
		
		return $count <= 0;
	}
	
	
	//--------------------------------------------------------------------------
	public function isMembership($user_id = null, $group_id = null)
	{
		$options = array(
			'conditions' => array(
				'Membership.user_id' => $user_id,
				'Membership.group_id' => $group_id,
			)
		);
		
		$count = $this->find('count', $options);
		
		return $count > 0;
	}
}

