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
	
	
	public function afterSave($created = false)
    {
        $group_id = $this->data['Membership']['group_id'];
        $user_id  = $this->data['Membership']['user_id'];
        
        $sql = "
        insert into flashcards_users(flashcard_id, user_id, created, updated)
        select flashcard_id, {$user_id} as user_id, now(), now()
        from   flashcards_groups as fg
        where  fg.group_id = {$group_id}
        and fg.flashcard_id not in (
           select flashcard_id
           from   flashcards_users fu
           where  user_id = {$user_id}
        )";
        
        $this->query($sql);
    }
	
	
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

