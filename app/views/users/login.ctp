
<div class='main users-login'>
	<?php
		echo $session->flash('auth');
	    
		echo $form->create('User');
		echo $form->input('username', array('type' => 'text', 'label' => __('Username', true)));
		echo $form->input('password', array('type' => 'password', 'label' => __('Password', true)));
		echo $form->end(__('Entrar', true));
	?>
</div>

