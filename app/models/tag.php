<?php

class Tag extends AppModel
{
	
	//--------------------------------------------------------------------------
	public function getAll()
	{
		return $this->find('all');
	}
}
