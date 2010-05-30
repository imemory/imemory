<?php

class Tag extends AppModel
{
	
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
