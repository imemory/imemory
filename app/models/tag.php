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
}
