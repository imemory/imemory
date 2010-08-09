
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<div class='invite'>
		<h3>É mais divertido com os amigos!</h3>
		<p><?= $this->Html->link('Convide seus amigos pra participar desta comunidade cheia de pessoas inteligentes.
		Podemos fazer isso com sua lista de email do Gmail, Yahoo e Hotmail.
		Juramos que não armazenaremos seus dados pessoais.',
		array('action' => 'invite'))?></p>
	</div>
	
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
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>

<div class='sidebar'>
	<?= $this->element('blocks/signup') ?>
	<p><?= $this->Html->link('Pesquisar', array('action' => 'search')); ?></p>
	<?= $this->element('blocks/latest_users') ?>
</div>

