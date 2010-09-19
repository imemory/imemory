<p class="language">
    <?php __('Language'); ?>:
    
    <?php echo $this->Html->link(
        $this->Html->image('flags/us.png'),
        '/lang/en_us',
        array(
            'title' => 'Select English language',
            'escape' => false
        )); ?>
    
    <?php echo $this->Html->link(
        $this->Html->image('flags/br.png'),
        '/lang/pt_br',
        array(
            'title' => 'Selecionar a língua portuguesa',
            'escape' => false)
        ); ?>
</p>

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
