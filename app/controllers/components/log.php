<?php

/**
 * Componente usado no sistema para logar ações do usuário
 */


App::import('Model', 'Log');

class LogComponent extends Object {
    
    private $Log;
    
    public $components = array('Auth');
    
    public function startup() {
        $this->Log = new Log();
    }
    
    // ------------------------------------------------------------------------
    /**
     *
     * Loga a adição de um flashcard pelo usuário
     *
     */
    public function logFlashcardAdded($flashcard_id)
    {
        $template = 'O usuário %user% adicionou um flashcard';
        $this->save($template);
    }
    
    
    /**
     *
     * Loga a entrada de um usuário em um grupo
     *
     */
     public function logMembership($group_id)
    {
        $template = 'O usuário %user% entrou em um grupo';
        $this->save($template);
    }
    
    
    // ------------------------------------------------------------------------
    /**
     *
     * Função genérica para logar as ações do usuário
     * Substitui um placeholder %user% pelo username do usuário logado
     *
     */
    public function save($message)
    {
        // substitui o placeholder %user% pelo nome do usuário atual
        $message = str_replace('%user%', $this->Auth->user('username'), $message);
        
        $data = array(
            'user_id' => $this->Auth->user('id'),
            'message' => $message
        );
        
        $this->Log->save($data);
    }
    
}
