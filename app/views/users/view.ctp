
<?php $this->set('title_for_layout', $user['User']['username'] . ' - imemory.com.br') ; ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function(){
		$('.users-view').tabs();
	});
<?php $this->Html->scriptEnd(); ?>

<div class='sidebar'>
	<p>#TODO</p>
</div>

<div class='main users-view'>
	<ul>
		<li><a href="#profile">Profile</a></li>
		<li><a href="#flashcards">Flashcards</a></li>
	</ul>
	
	<div id="profile">
		<?php if ( ! $is_follower): ?>
			<?= $this->Form->create('User', array('url' => array('controller' => 'followings','action' => 'add'))) ?>
			<?= $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id'])) ?>
			<?= $this->Form->end('Follow') ?>
		<?php else: ?>
			<?= $this->Form->create('User', array('url' => array('controller' => 'followings','action' => 'delete'))) ?>
			<?= $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id'])) ?>
			<?= $this->Form->end('Unfollow') ?>
		<?php endif; ?>
		------
		<?php pr($user); ?>
	</div>
	
	<div id="flashcards">
		#TODO: flashcards aqui
	</div>
</div>

