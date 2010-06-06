
<div class='main users-login'>
	<?php
		echo $session->flash('auth');
	
		echo $form->create('User');
		echo $form->input('username', array('type' => 'text'));
		echo $form->input('password', array('type' => 'password'));
		echo $form->end('Login');
	?>
</div>

