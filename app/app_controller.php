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
	 *
	 * Form: Para criar elementos de formulários nas views
	 *
	 * Gravatar: Interface para as carinhas do gravatar
	 *
	 * Google: Implementa vários serviços do Google como o analytics
	 *
	 * Html: Usado para criar elementos do HTML nas views
	 *
	 * Session: Usado para trabalhar com a sessão nas views
	 *
	 */
	public $helpers = array('Form', 'Gravatar', 'Google', 'Html', 'Session', 'Time');
	
	
	//--------------------------------------------------------------------------
	/**
	 * Antes de executar a ação
	 * 
	 * Passa para a view o usuário logado atualmente
	 */
	 public function beforeFilter()
	 {
	    parent::beforeFilter();
	    
	    $user = $this->Auth->user();
	    
	    if ( ! empty($user)) {
	        unset($user['User']['password']);
	    }
	    
	    $this->set('User', $user);
	 }
}

