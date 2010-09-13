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
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('index', 'view', 'getLatest');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite a pesquisa e paginação dos grupos.
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
				'or' => array(
					'Group.name ilike' => "%{$this->params['named']['s']}%",
					'Group.description ilike' => "%{$this->params['named']['s']}%"
				)
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
	public function view($group_id = null)
	{
		// pega o id do usuário na sessão
		$user_id = $this->currentUser['id'];
		
		// pega o grupo
		$group = $this->Group->getById($group_id);
		
		// Lógica para saber se o usuário logado faz parte do grupo
		$is_member = false;
		if ($this->Group->Membership->isMembership($user_id, $group_id)) {
			$is_member = true;
		}
		
		// Pega as mensagens enviadas para o grupo
		$messages = $this->Group->GroupMessage->getByGroupId($group_id);
		
		
		$this->set('group', $group);
		$this->set('messages', $messages);
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
			$this->data['Group']['owner_id'] = $this->currentUser['id'];
			
			if ($this->Group->save($this->data)) {
				
				$this->Group->Membership->save(array(
					'user_id' => $this->currentUser['id'],
					'group_id' => $this->Group->id
				));
				
				$this->flashOk(__('Grupo criado com sucesso!', true));
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
			$this->flashError(__('Grupo não encontrado! Tente novamente.', true));
			$this->redirect(array('controller' => 'groups'));
		}
		
		// pega o id do usuário na sessão
		$user_id = $this->currentUser['id'];
		
		// verifica se o usuário realmente é dono do grupo
		if ($user_id != $group['Group']['owner_id']) {
			$this->flashError(__('Você não tem permissão para editar este grupo', true));
			$this->redirect(array('controller' => 'groups'));
		}
		
		if (empty($this->data)) {
			$this->data = $group;
		
		} else {
			
			if ($this->Group->save($this->data)) {
				$this->flashOk(__('Grupo atualizado com sucesso', true));
				$this->redirect(array('controller' => 'groups', 'action' => 'view', $id));
			}
		}
	}
	
	
	public function getLatest($quantity = 12)
	{
		return $this->Group->getLatest($quantity);
	}
}

