
<?php $this->set('title_for_layout',
	$user['User']['username'] . ' - imemory.com.br') ; ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function(){
		$('.users-view').tabs();
	});
<?php $this->Html->scriptEnd(); ?>

<div class='sidebar'>
	<p><h2><?= $user['User']['username'] ?></h2></p>
	<p><?= $this->Gravatar->image($user['User']['email'], 80) ?></p>
	<p><?= $this->Html->link(
		$user['User']['following_count'] . ' followings',
		array(
			'action' => 'following'
		)
	) ?></p>
	<p><?= $this->Html->link(
		$followers_count . ' followers',
		array(
			'action' => 'followers'
		)
	) ?></p>
	
	<?php
	$atual = $this->Session->read('Auth.User');
	
	if ( !empty($atual) && $atual['is_admin'] === true) {
    	$novo_status = 1;
	    $nova_mensagem = "Conceder moderação";
	    
	    if ($user['User']['is_moderator']) {
	        $novo_status = 0;
	        $nova_mensagem = "Revogar moderação";
	    }
	?>
	<p>
	    <?= $this->Html->link(
		$nova_mensagem,
		array(
		    'controller' => 'users',
			'action' => 'change_moderation',
			$user['User']['id'],
			$novo_status
		)
	) ?>
	</p>
	<?php } ?>
	
	<?php
	if (
	    ! empty($atual) &&
	    (
	        ($atual['is_admin']) ||
	        ($atual['is_moderator']) && ! $user['User']['is_moderator']
        )
    ) {
	    $novo_status = 1;
	    $nova_mensagem = "Bloquear";
	    
	    if ($user['User']['is_blocked']) {
	        $novo_status = 0;
	        $nova_mensagem = "Desbloquear";
	    }
	?>
	<p>
	    <?= $this->Html->link(
		$nova_mensagem,
		array(
		    'controller' => 'users',
			'action' => 'change_block',
			$user['User']['id'],
			$novo_status
		)
	) ?>
	</p>
	<?php } ?>
	
</div>

<div class='main users-view'>
	<ul>
		<li><a href="#profile">Profile</a></li>
		<li><a href="#flashcards">Flashcards</a></li>
	</ul>
	
	<div id="profile">
		<?php if ( ! $follows): ?>
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

