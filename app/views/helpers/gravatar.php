<?php

class GravatarHelper extends AppHelper
{
	//--------------------------------------------------------------------------
	public $helpers = array('Html');
	
	
	//--------------------------------------------------------------------------
	public $defaultImage = 'monsterid';
	
	
	//--------------------------------------------------------------------------
	public function image($email, $size = 40)
	{
		$urlTemplate = 'http://www.gravatar.com/avatar/%s.jpg?s=%d&amp;r=g&amp;d=%s';
		
		$email = md5($email);
		
		$url = sprintf(
			$urlTemplate,
			$email,
			$size,
			$this->defaultImage
		);
		
		return $this->Html->image($url);
	}
	
	
	//--------------------------------------------------------------------------
	public function link($id, $email, $size = 40)
	{
		return $this->Html->link(
			$this->image($email, $size),
			array(
				'controller' => 'users',
				'action' => 'view',
				'username' => $id
			),
			array('escape' => false)
		);
	}
}

