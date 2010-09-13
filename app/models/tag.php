<?php

class Tag extends AppModel
{
    //--------------------------------------------------------------------------
	public $validate = array(
		// Username
		'name' => array(
			'be_unique' => array(
				'rule'		=> 'isUnique',
				'message'	=> 'Esta tag já foi adicionada.'
			)
		)
	);
	
	//--------------------------------------------------------------------------
	public $hasMany = array(
		'FlashcardsTag' => array(
			'className' => 'FlashcardsTag',
			'foreignKey' => 'tag_id'
		)
	);
	
	
	//--------------------------------------------------------------------------
	/**
	 * Salva um lote de tags retornando um array dos ID destes flashcards
	 */
    public function batchSave($tags)
    {
        foreach($tags as $idx => $tag) {
            
            // Primeiro pesquisa:
            $searched = $this->find('first', array('fields' => array('id'), 'conditions' => array('Tag.name' => $tag)));
            if($searched) {
                $tags[$idx]['id'] = $searched['Tag']['id'];
            } else {
                $this->create();
                if ($this->save($tag)) {
                    $tags[$idx]['id'] = $this->getLastInsertID();
                }
            }
        }
        
        return $tags;
    }
    
    
	//--------------------------------------------------------------------------
	public function getAll()
	{
		$options = array(
			'order' => array('Tag.name')
		);
		
		return $this->find('all', $options);
	}
	
	
	//--------------------------------------------------------------------------
	public function getLatest($quantity = 12)
	{
		$options = array(
			'order' => 'Tag.id DESC',
			'limit' => $quantity,
		);
		
		return $this->find('all', $options);
	}
}
