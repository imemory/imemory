
<?php $this->set('title_for_layout', $user['User']['username'] . ' - imemory.com.br') ; ?>

<div class='sidebar'>
	<p>#TODO</p>
</div>

<div class='main'>
<?php
	
	
	echo $this->Form->create('User', array('url' => array(
		'controller' => 'followings',
		'action' => 'add'
	)));
	
	echo $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id']));
	echo $this->Form->end('Follow');
	
	
	pr($user);
?>

</div>
