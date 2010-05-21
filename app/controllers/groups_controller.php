<?php

class GroupsController extends AppController
{
	//--------------------------------------------------------------------------
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	
	
	//--------------------------------------------------------------------------
	public function index()
	{
		$latest_groups = $this->Group->getLatest();
		$this->set('latest_groups', $latest_groups);
	}
	
	
	//--------------------------------------------------------------------------
	public function view($id)
	{
		$group = $this->Group->findById($id);
		
		$this->set('group', $group);
	}
	
	//--------------------------------------------------------------------------
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
	public function edit($id = null)
	{
		$group = $this->Group->read(null, $id);
		
		// check if group exists
		if ( ! $group) {
			$this->Session->setFlash('Grupo não encontrado');
			$this->redirect(array('controller' => 'home'));
		}
		
		// get user id
		$user_id = $this->Auth->user('id');
		
		// check if user own the group
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

