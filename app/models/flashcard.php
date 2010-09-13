<?php

class Flashcard extends AppModel
{
    
    //--------------------------------------------------------------------------
	public $belongsTo = array(
		'Owner' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
	
	
	//--------------------------------------------------------------------------
	/**
	 *
	 * Retorna os ultimos flashcards criados
	 *
	 */
	public function getLatest($quantity = 5)
	{
	    $options = array(
	        'limit' => $quantity,
	        'order' => array(
	            'Flashcard.created DESC'
	        )
	    );
	    
	    return $this->find('all', $options);
	}
	
	
	public function getTopContributors($quantity = 5)
	{
	    $options = array(
	        'fields'  => array(
                'Flashcard.user_id',
                'Owner.username',
                'Owner.email',
                'COUNT(*) as total_flashcards'
            ),
            'contain' => array('Owner'),
            'group'   => array(
                'Flashcard.user_id',
                'Owner.id',
                'Owner.username',
                'Owner.email'
            ),
            'order' => 'total_flashcards desc',
            'limit' => $quantity
	    );
	    
	    return $this->find('all', $options);
	}
}
