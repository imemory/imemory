<?php

/**
 * Controller dos Grupos
 *
 * Agrupa os métodos relacionados aos grupos
 */
class GroupsController extends AppController
{
	//--------------------------------------------------------------------------
	/**
	 * Opções de paginação
	 * Retorna 10 grupos com seus donos
	 */
	public $paginate = array(
		'contain' => array(
			'Owner' => array(
				'fields' => array('Owner.id', 'Owner.username')
			)
		),
		'limit' => 10
	);
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa as páginas listadas no array
	 */
	public function beforeFilter() {
		$this->Auth->allow('index', 'view', 'getLatest');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite a pesquisa e paginação dos grupos.
	 * TODO: Adicionar lógica de pesquisa.
	 */
	public function index()
	{
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
				'Group.name ilike' => "%{$this->params['named']['s']}%"
			);
		}
		
		$groups = $this->paginate();
		$latest_groups = $this->Group->getLatest();
		
		$this->set('groups', $groups);
		$this->set('latest_groups', $latest_groups);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Visualiza a página de um grupo com seus usuários e flashcards associados.
	 */
	public function view($id)
	{
		// pega o id do usuário na sessão
		$user_id = $this->Auth->user('id');
		
		// pega o grupo
		$group = $this->Group->getById($id);
		
		$is_member = false;
		if ($this->Group->Membership->isMembership($user_id, $group['Group']['id'])) {
			$is_member = true;
		}
		
		$this->set('group', $group);
		$this->set('is_member', $is_member);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário logado adicione um novo grupo
	 * TODO: adicionar o usuário no próprio grupo criado automaticamente
	 */
	public function add()
	{
		if ( ! empty($this->data)) {
			
			// set owner id
			$this->data['Group']['owner_id'] = $this->Auth->user('id');
			
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('Grupo criado com sucesso');
				$group_id = $this->Group->id;
				$this->redirect(array('action' => 'view', $group_id));
			}
		}
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite que um usuário logado edit o seu próprio grupo criado
	 */
	public function edit($id = null)
	{
		$group = $this->Group->read(null, $id);
		
		// verifica se o grupo existe
		if ( ! $group) {
			$this->Session->setFlash('Grupo não encontrado');
			$this->redirect(array('controller' => 'home'));
		}
		
		// pega o id do usuário na sessão
		$user_id = $this->Auth->user('id');
		
		// verifica se o usuário realmente é dono do grupo
		if ($user_id != $group['Group']['owner_id']) {
			$this->Session->setFlash('Você não tem permissão para editar este grupo');
			$this->redirect(array('controller' => 'home'));
		}
		
		if (empty($this->data)) {
			$this->data = $group;
		
		} else {
			
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('Grupo atualizado com sucesso');
				$this->redirect(array('controller' => 'home'));
			}
		}
	}
	
	
	public function getLatest($quantity = 12)
	{
		return $this->Group->getLatest($quantity);
	}
}

