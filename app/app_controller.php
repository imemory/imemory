<?php

class AppController extends Controller
{
    //--------------------------------------------------------------------------
    /**
     * Componentes do CakePHP usados
     * Auth: Usado para criar a autenticação do usuário, faz o login e o logout
     * do usuário.
     *
     * Log: Usado para logar ações dos usuários
     *
     * P28n: Usado para alterar a linguagem do sistema
     *
     * RequestHandler: Usado para obter mais informações sobre as requisições
     * dos usuários como por exemplo: se foi um método POST.
     *
     * Session: Controla a sessão.
     */
    public $components = array('Auth', 'Log', 'P28n', 'RequestHandler', 'Session');
    
    
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
     * Text: Funções para manipular texto. Por exemplo truncar o texto
     *
     * Time: Para converter datas e horas em formatos agradaveis
     *
     */
    public $helpers = array('Form', 'Gravatar', 'Google', 'Html', 'Session', 'Text', 'Time');
    
    
    //--------------------------------------------------------------------------
    /**
     *
     * Mantem uma referência para o usuário logado
     *
     */
    public $currentUser;
    
    
    //--------------------------------------------------------------------------
    /**
     * Antes de executar a ação
     * 
     * Passa para a view o usuário logado atualmente
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        $this->initAuth();
        $this->initLogin();
        $this->initLang();
    }

    //--------------------------------------------------------------------------
    /**
     *
     * Configura o AuthComponent
     *
     */
    public function initAuth()
    {
        $this->Auth->loginRedirect  = array('controller' => 'home', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'home', 'action' => 'index');
        $this->Auth->loginError = __('Ops! Login failed. Invalid username or password.', true);
        $this->Auth->authError  = __('Ops! You must be logged in to do this.', true);
    }
    
    
    //--------------------------------------------------------------------------
    /**
     *
     * Define o atributo login contendo os dados do usuário corrente
     *
     */
    public function initLogin()
    {
        $user = $this->Auth->user();
        
        if ( ! empty($user)) {
            unset($user['User']['password']);
        }
        $this->currentUser = $user['User'];
        $this->set('User', $user['User']);
    }
    
    
    /**
     *
     * Define a linguagem de acordo com a preferencia do usuário
     *
     */
    public function initLang()
    {
        if($this->currentUser) {
            $this->P28n->change($this->currentUser['language']);
        }
    }
    
    
    /**
     *
     * cria um flash com uma mensagem de ok
     *
     */
    public function flashOk($message)
    {
        $this->Session->setFlash($message, 'default', array('class' => 'flash-ok'));
    }
    
    
    /**
     *
     * cria um flash com uma mensagem de erro
     *
     */
    public function flashError($message)
    {
        $this->Session->setFlash($message, 'default', array('class' => 'flash-error'));
    }
}

