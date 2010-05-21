<?php

class AppController extends Controller
{
	//--------------------------------------------------------------------------
	public $components = array('Auth', 'Session');
	
	
	//--------------------------------------------------------------------------
	public $helpers = array('Session', 'Html', 'Form');
}

