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
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('index', 'getLatest', 'following', 'view', 'signup', 'search');
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
	 * Página de buscas dos usuários
	 */
	public function search()
	{
	    $this->paginate = array(
    		'limit' => 20
		);
		
	    // Se enviou o formulario de pesquisa
		if ( ! empty($this->data)) {
			$this->redirect(array_merge(
				$this->params['named'],
				array('s' => $this->data['s'])
			));
		}
		
		// Se o parâmetro de pesquisa for especificado
		if( isset($this->params['named']['s'])) {
			$this->paginate['conditions'] = array(
				'User.username ilike' => "%{$this->params['named']['s']}%"
			);
		}
		
		$users = $this->paginate();
		$this->set('users', $users);
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
		
		// pega a quantidade de seguidores
		$followers_count = $this->User->getFollowersCount($id);
		
		// Lógica para saber se o usuário logado segue o que esta visualizando
		$follows = false;
		$this->User->id = $user_id;
		if ($this->User->follows($user['User']['id'])) {
			$follows = true;
		}
		
		$this->set('user', $user);
		$this->set('follows', $follows);
		$this->set('followers_count', $followers_count);
	}
	
	
	//--------------------------------------------------------------------------
	public function following($id = null)
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
		// Verifica se o usuário já está logado
		$user = $this->Auth->user();
		
		if ( ! is_null($user)) {
			$this->Session->setFlash('Você já esta cadastrado e logado. Se quiser
			cadastrar uma outra pessoa, primeiro sai da sua conta atual clicando
			no link "sair" lá em cima, próximo do seu avatar.');
			
			$this->redirect(array(
					'controller' => 'home',
					'action' => 'index'
				));
		}
		
		if ( ! empty($this->data)) {
			
			$pass_1 = $this->data['User']['password1'];
			$pass_2 = $this->data['User']['password2'];
			
			$this->data['User']['password'] = $this->Auth->password($pass_1);
			
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Usuário cadastrado');
				$this->redirect(array(
					'controller' => 'home',
					'action' => 'index'
				));
			} else {
			    $this->data['User']['password1'] = $pass_1;
			    $this->data['User']['password2'] = $pass_2;
			}
		}
	}
	
	//--------------------------------------------------------------------------
	/**
	 * Altera o status de moderação de um usuário passado como parametro
	 * o ID do usuário e novo status
	 */
	public function change_moderation($id, $status = 0)
	{
	    // pega o usuário logado que é um moderador
		$current_user = $this->Auth->user();
		
		if ($current_user['User']['is_admin'] === true) {
		    $this->User->id = $id;
		    $this->User->saveField('is_moderator', $status);
		    $this->Session->setFlash('Status de moderador adicionado ou revogado para o usuário.');
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'view',
				$id
			));
		} else {
		    $this->Session->setFlash('Você deve ser um administrador do sistema para fazer isto.');
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'view',
				$id
			));
		}
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Altera o status de moderação de um usuário passado como parametro
	 * o ID do usuário e novo status
	 */
	 public function change_block($id, $status = 0)
	 {
	    // pega o usuário logado que é um moderador
		$current_user = $this->Auth->user();
		
		if ($current_user['User']['is_admin'] || $current_user['User']['is_moderator']) {
		    $this->User->id = $id;
		    $this->User->saveField('is_blocked', $status);
		    $this->Session->setFlash('Usuário bloqueado ou desbloqueado.');
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'view',
				$id
			));
		} else {
		    $this->Session->setFlash('Você deve ser um administrador do sistema para fazer isto.');
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'view',
				$id
			));
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

