
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
	
	<?php if( ! $is_currentUser) { ?>
	<p>
        <?php if ( ! $follows): ?>
            <?= $this->Form->create('User', array('url' => array('controller' => 'followings','action' => 'add'))) ?>
            <?= $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id'])) ?>
            <?= $this->Form->end('Follow') ?>
        <?php else: ?>
            <?= $this->Form->create('User', array('url' => array('controller' => 'followings','action' => 'delete'))) ?>
            <?= $this->Form->input('User.id', array('type' => 'hidden', 'value'=> $user['User']['id'])) ?>
            <?= $this->Form->end('Unfollow') ?>
        <?php endif; ?>
	</p>
	
	<?php } ?>
	
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
		<li><a href="#profile"><?php echo ( ! $is_currentUser) ? __('Profile', true) : __('Your Profile', true);?></a></li>
		<li><a href="#flashcards"><?php echo __('Flashcards');?></a></li>
		<li><a href="#groups"><?php echo __('Groups');?></a></li>
	</ul>
	
	<div id="profile">
	    <h2><?php echo $user['User']['username']; ?></h2>
	    <p>Since: <?php echo $this->Time->niceShort($user['User']['created']); ?></p>
	</div>
	
	<div id="flashcards">
		#TODO: flashcards aqui
	</div>
	
	<div id="groups">
	    <h2><?php __('Some groups where this participant is a member'); ?></h2>
	    
	    <?php if ( empty($user['Membership'])) { ?> 
    		
    		<p>O usuário não entrou em nenhum grupo ainda</p>
    		
		<?php } else { ?> 
		    <dl>
		        <?php foreach($user['Membership'] as $m) { ?> 
		        <dt><?php echo $this->Html->link($m['Group']['name'], array('controller' => 'groups', 'action' => 'view', $m['Group']['id'])); ?></dt>
		        <p><?php echo $m['Group']['description']; ?></p>
		        <?php } ?> 
            </dl>
		<?php } ?> 
	</div>
</div>

