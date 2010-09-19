
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<?= $this->element('locale/'. Configure::read('Config.language') .'_invite'); ?>
	
	<div class='featured'>
		<h3><?php __('Students who stood out in their studies') ?></h3>
		
		<?php $latest = $this->requestAction(array('controller' => 'flashcards_users', 'action'=>'getWhoStoodOut')); ?>
		<ul>
		<?php foreach($latest as $user): ?>
			<li><?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	<div class='featured'>
		<h3><?php __('Top contributors') ?></h3>
		
		<?php $latest = $this->requestAction(array('controller' => 'flashcards', 'action'=>'getTopContributors')); ?>
		<ul>
		<?php foreach($latest as $user): ?>
			<li><?= $this->Gravatar->link($user['Owner']['id'], $user['Owner']['email']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>

<div class='sidebar'>
	<p><?= $this->Html->link(__('Search', true), array('action' => 'search'), array('class' => 'button')); ?></p>
	
	<?= $this->element('blocks/latest_users') ?>
</div>

