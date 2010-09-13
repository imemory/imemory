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
}
