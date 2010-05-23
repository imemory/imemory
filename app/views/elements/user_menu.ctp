<p class="photo">
    <?php if($this->Session->check('Auth.User')) {
        $_user = $this->Session->read('Auth.User');
        echo $gravatar->link($_user['username'], $_user['email'])
        . ' Olá ' . $_user['username'] . '!';
    } else {
        echo $this->Html->image(
            'guest.png'
        )
        .' Olá visitante!';
    } ?>
</p>

<p>
<?php if($session->check('Auth.User')) {
    echo $this->Html->link('Sair', array(
    'controller' => 'users',
    'action' => 'logout'
    ));
} else {
    echo $this->Html->link('Entrar', array(
    'controller' => 'users',
    'action' => 'login'
    ))
    .' ou '.
    $this->Html->link('Cadastrar', array(
    'controller' => 'users',
    'action' => 'signup'
    ));
} ?>
</p>
