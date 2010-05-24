<?php

class AppController extends Controller
{
	//--------------------------------------------------------------------------
	/**
	 * Componentes do CakePHP usados
	 * Auth: Usado para criar a autenticação do usuário, faz o login e o logout
	 * do usuário.
	 *
	 * RequestHandler: Usado para obter mais informações sobre as requisições
	 * dos usuários como por exemplo: se foi um método POST.
	 *
	 * Session: Controla a sessão.
	*/
	public $components = array('Auth', 'RequestHandler', 'Session');
	
	
	//--------------------------------------------------------------------------
	/**
	 * Helpers usados
	 * Session: Usado para trabalhar com a sessão nas views
	 *
	 * Html: Usado para criar elementos do HTML nas views
	 *
	 * Form: Para criar elementos de formulários nas views
	 *
	 * Gravatar: Interface para as carinhas do gravatar
	 */
	public $helpers = array('Form', 'Gravatar', 'Html', 'Session');
}

