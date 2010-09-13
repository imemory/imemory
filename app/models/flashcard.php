<?php

class Flashcard extends AppModel
{
    
    //--------------------------------------------------------------------------
    public $validate = array(
        // Username
        'front' => array(
            'valid_front' => array(
                'rule'		=> 'notEmpty',
                'message'	=> 'Você deve informar o que vai ser mostrado na frente.'
            )
        ),
        'back' => array(
            'valid_front' => array(
                'rule'		=> 'notEmpty',
                'message'	=> 'Você deve informar o que vai ser mostrado no verso.'
            )
        ),
        'tags' => array(
            'valid_front' => array(
                'rule'		=> 'notEmpty',
                'message'	=> 'Você deve informar pelo menos uma tag.'
            )
        )
    );
    
    //--------------------------------------------------------------------------
	public $hasMany = array(
		'FlashcardsTag' => array(
			'className' => 'FlashcardsTag',
			'foreignKey' => 'user_id'
		),
		'FlashcardsUser' => array(
			'className' => 'FlashcardsUser',
			'foreignKey' => 'user_id'
		)
	);
	
	
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
	 * Salva um flashcard com suas tags
	 *
	 */
	 public function save($data)
	 {
	    $result = parent::save($data);
	    
	    if ($result === false) {
	        return false;
	    }
	    
	    $flashcardID = $this->getLastInsertID();
	    
	    $clean_tags = explode(' ', trim(preg_replace('/[\s,][\s,]+/', ' ', $data['Flashcard']['tags'])));
	    
	    $tags = array();
	    foreach($clean_tags as $tag) {
	        $tags[] = array('name' => $tag);
	    }
	    
	    $tags = $this->FlashcardsTag->Tag->batchSave($tags);
	    
	    $flashcards_tag = array();
	    foreach($tags as $tag) {
	        if(isset($tag['id'])) {
	            $flashcards_tag[] = array(
	                'flashcard_id' => $flashcardID,
	                'tag_id'       => $tag['id']
	            );
            }
	    }
	    
	    $this->FlashcardsTag->saveAll($flashcards_tag);
	    
	    
	    $inStack = array(
	        'flashcard_id' => $flashcardID,
	        'user_id'      => $data['Flashcard']['user_id']
	    );
	    
	    $this->FlashcardsTag->Flashcard->FlashcardsUser->save($inStack);
	    
	    return $result;
	 }
	
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
