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
}
