
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<?= $this->element('locale/en_invite'); ?>
	
	<div class='featured'>
		<h3><?php __('Estudantes que se destacaram') ?></h3>
		
		<?php $latest = $this->requestAction(array('controller' => 'users', 'action'=>'getLatest', 4)); ?>
		<ul>
		<?php foreach($latest as $user): ?>
			<li><?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	<div class='featured'>
		<h3><?php __('Os Últimos usuários cadastrados') ?></h3>
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
	<p><?= $this->Html->link(__('Search', true), array('action' => 'search')); ?></p>
	<?= $this->element('blocks/latest_users') ?>
</div>

