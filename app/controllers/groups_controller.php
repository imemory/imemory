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
	 * Permite que um usuário não logado possa ver a página dos grupos e a
	 * página de um grupo.
	 */
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Permite a pesquisa e paginação dos grupos.
	 * TODO: Adicionar paginação e lógica de pesquisa.
	 */
	public function index()
	{
		$latest_groups = $this->Group->getLatest();
		$this->set('latest_groups', $latest_groups);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Visualiza a página de um grupo com seus usuários e flashcards associados.
	 */
	public function view($id)
	{
		$group = $this->Group->findById($id);
		
		$this->set('group', $group);
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
}

