<p class="photo">
    <?php if($this->Session->check('Auth.User')) {
        $_user = $this->Session->read('Auth.User');
        echo $gravatar->link($_user['username'], $_user['email'])
        .' '. __('Hello', true) .' '. $_user['username'] . '!';
    } else {
        echo $this->Html->image(
            'guest.png'
        )
        .' '. __('Hello Guest', true) .'!';
    } ?>
</p>

<p>
<?php if($session->check('Auth.User')) {
    echo $this->Html->link(__('Logout', true), array(
    'controller' => 'users',
    'action' => 'logout'
    ));
} else {
    echo $this->Html->link(__('Login', true), array(
    'controller' => 'users',
    'action' => 'login'
    ))
    .' ou '.
    $this->Html->link(__('Signup', true), array(
    'controller' => 'users',
    'action' => 'signup'
    ));
} ?>
</p>
