
<div class='main users-login'>
	<?php
		echo $session->flash('auth');
	    
		echo $form->create('User');
		echo $form->input('username', array('type' => 'text', 'label' => __('username', true)));
		echo $form->input('password', array('type' => 'password', 'label' => __('password', true)));
		echo $form->end(__('Login', true));
	?>
</div>

