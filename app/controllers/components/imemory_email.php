<?php

class ImemoryEmailComponent extends Object
{
	public $components = array('Email');
	
	
	//--------------------------------------------------------------------------
	public function startup(&$controller)
	{
		$this->controller =& $controller;
		$this->setupEmail();
	}
	
	
	//--------------------------------------------------------------------------
	private function setupEmail()
	{
		$this->Email->smtpOptions = array(
			'port'		=> '465',
			'timeout'	=> '30',
			'host'		=> 'ssl://smtp.gmail.com',
			'username'	=> Configure::read('Email.username'),
			'password'	=> Configure::read('Email.password'),
		);
		
		$this->Email->delivery = 'debug';
		$this->Email->from = 'iMemory.com.br <project.imemory@gmail.com>';
		$this->Email->sendAs = 'text';
	}
	
	
	//--------------------------------------------------------------------------
	public function setTemplate($template)
	{
		$this->Email->template = $template;
	}
	
	
	//--------------------------------------------------------------------------
	public function setTo($user)
	{
		$this->Email->to = "{$user['username']} <{$user['email']}>";
	}
	
	
	//--------------------------------------------------------------------------
	public function setSubject($subject)
	{
		$this->Email->subject = $subject;
	}
	
	
	//--------------------------------------------------------------------------
	public function setDebug()
	{
		$this->Email->delivery = 'debug';
	}
	
	
	//--------------------------------------------------------------------------
	public function send()
	{
		$this->Email->send();
	}
}

