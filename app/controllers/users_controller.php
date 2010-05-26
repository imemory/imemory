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
		$user = $this->User->read(null, $id);
		
		if ( ! $user) {
			$this->Session->setFlash('Usuário não encontrado');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$this->set('user', $user);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Método usado para fazer um usuário seguir outro.
	 * Como no twitter, um usuário pode acompanhar o que o outro está fazendo.
	 */
	public function follow()
	{
		$friend_id = $this->data['User']['id'];
		$current_user = $this->Auth->user('id');
		
		if ($friend_id == $current_user) {
			$this->Session->setFlash('Você não pode seguir você mesmo');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$friend = $this->User->read(null, $friend_id);
		
		if ( ! $friend) {
			$this->Session->setFlash('Usuário não encontrado');
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		
		$data = array(
			'user_id' => $this->Auth->user('id'),
			'friend_id' => $friend['User']['id'],
		);
		
		if ($this->User->Followings->save($data)) {
			$this->Session->setFlash('Agora você segue ' . $friend['User']['username']);
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
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
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
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
}

