<div class='sidebar'>
	<p>#TODO</p>
</div>

<div class='main'>
<?php
	
	
	echo $this->Form->create('User', array(
		'controller' => 'users',
		'action'=>'follow'
	));
	
	echo $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id']));
	echo $this->Form->end('Follow');
	
	
	pr($user);
?>

</div>
