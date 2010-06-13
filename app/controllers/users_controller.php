<?php

/**
 * Controller dos Usuários
 *
 * Agrupa os métodos relacionados aos usuários
 */
class UsersController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa ver a página dos usuários,
	 * a página pessoal de um usuário e a página de cadastro.
	 */
	function beforeFilter() {
		$this->Auth->allow('index', 'view', 'signup', 'getLatest');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Um dashboard dos usuários. Mostra os últimos cadastrados, os que
	 * contribuem mais e são mais ativos.
	 */
	public function index()
	{
		$this->set('users', $this->paginate());
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Visualiza os dados de um usuário
	 */
	public function view($id = null)
	{
		// pega o id do usuário na sessão
		$user_id = $this->Auth->user('id');
		
		// pega o usuário
		$user = $this->User->getById($id);
		
		$is_follower = false;
		$this->User->id = $user_id;
		if ($this->User->isFollower($user['User']['id'])) {
			$is_follower = true;
		}
		
		$this->set('user', $user);
		$this->set('is_follower', $is_follower);
	}
	
	
	public function Following($id = null)
	{
		$following = $this->User->Following->getAllById($id);
	}
	
	//--------------------------------------------------------------------------
	/**
	 * Efetua o cadastro do usuário
	 * TODO: Enviar e-mail de confirmação?
	 */
	public function signup()
	{
		if ( ! empty($this->data)) {
			
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Usuário cadastrado');
				$this->redirect(array(
					'controller' => 'home',
					'action' => 'index'
				));
			}
		}
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Usa em conjunto com o Componente Auth.
	 * Usa os dados do formulário de login para verificar no banco de dados se
	 * o usuário existe. No caso de existir, cria a sessão deste.
	 * Tudo isso é feito pelo AuthComponent, portanto nada é colocado aqui
	 */
	public function login()
	{}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Usado em conjunto com o Componente Auth.
	 * Destroi a sessão do usuário e redireciona para a home
	 */
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Retorna os ultimos usuários cadastrados
	 */
	public function getLatest($quantity = 12)
	{
		return $this->User->getLatest($quantity);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Retorna os usuários que mais contribuiram
	 */
	public function getTopContributors($quantity = 12)
	{
		return $this->User->getTopContributors($quantity);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Retorna os usuários mais populares
	 */
	public function getPopular($quantity = 12)
	{
		return $this->User->getPopular($quantity);
	}
}

