
<div class='main'>
<?php
	echo $session->flash('auth');
	
	echo $form->create('User');
	echo $form->input('username');
	echo $form->input('password');
	echo $form->end('Login');
?>
</div>
