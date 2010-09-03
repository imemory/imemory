<?php

class P28nController extends AppController {
    public $name = 'P28n';
    public $uses = array();
    public $components = array('P28n');
    
    
    //--------------------------------------------------------------------------
	/**
	 * Permite que um usuário não logado possa trocar a linguagem.
	 */
	function beforeFilter() {
	    
	    // Chama o método beforeFilter do AppController
	    parent::beforeFilter();
	    
		$this->Auth->allow('change', 'shuntRequest');
	}
	
    
    public function change($lang = null) {
        $this->P28n->change($lang);
        $this->redirect($this->referer(null, true));
    }
    
    public function shuntRequest() {
        $this->P28n->change($this->params['lang']);
        $args = func_get_args();
        $this->redirect("/" . implode("/", $args));
    }
}
