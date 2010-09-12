<p class="photo">
    <?php if($User) {
        echo $gravatar->link($User['id'], $User['email'])
        .' '. __('Hello', true) .' '. $User['username'] . '! ';
        
        echo $this->Html->link(__('See your profile', true), array(
            'controller' => 'users',
            'action'     => 'view',
            $User['id']
        ));
        
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
