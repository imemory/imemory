
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	<div class='invite'>
		<h2>Convide seus amigos</h2>
		<p>Convide seus amigos para participar.</p>
	</div>
	
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<div class='featured'>
		<h3>Estudantes que se destacaram</h3>
		
		<?php $latest = $this->requestAction(array('controller' => 'users', 'action'=>'getLatest', 4)); ?>
		<ul>
		<?php foreach($latest as $user): ?>
			<li><?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	<div class='featured'>
		<h3>Os Últimos usuários cadastrados</h3>
		<?php $latest = $this->requestAction(array('controller' => 'users', 'action'=>'getLatest', 4)); ?>
		
		<ul>
			<?php foreach($latest as $user): ?>
				<li><?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<div class='sidebar'>
	<?= $this->element('blocks/signup') ?>
	<?= $this->element('blocks/latest_users') ?>
</div>

