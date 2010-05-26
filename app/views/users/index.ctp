
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<h3>Estudantes que se destacaram</h3>
	
	<h3>Os Últimos usuários cadastrados</h3>
	
</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(__('signup', true), array('action' => 'signup')) ?></p>
	</div>
	
	<div class='box'>
		<h3>Latest Users</h3>
		<?php
		$latest_users = $this->requestAction(
			array('controller' => 'users', 'action'=>'getLatest')
		);
		
		foreach($latest_users as $user): ?>
			<?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?>
		<?php endforeach; ?>
	</div>
</div>

