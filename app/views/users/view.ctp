
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
		$user['User']['following_count'] . ' followers',
		array(
			'action' => 'following'
		)
	) ?></p>
	<p><?= $this->Html->link(
		$followers_count . ' followings',
		array(
			'action' => 'followers'
		)
	) ?></p>
	
	
	<?php if (! empty($logs)) { ?>
	<div class="userlog">
	    <h3><?php __('Atualizações dos seus amigos'); ?></h3>
	    <ul>
	    <?php foreach($logs[0] as $log) { ?>
	        <li><?php echo $log['message']?></li>
	    <?php } ?>
	    </ul>
	</div>
	<?php } ?>
</div>

<div class='main users-view'>
	<ul>
		<li><a href="#profile"><?php echo ( ! $is_currentUser) ? __('Profile', true) : __('Your Profile', true);?></a></li>
		<li><a href="#flashcards"><?php echo __('Flashcards');?></a></li>
		<li><a href="#groups"><?php echo __('Groups');?></a></li>
	</ul>
	
	<div id="profile">
	    <h2>
	        <?php echo $user['User']['username']; ?>
	        <?php if($is_currentUser) { __('(É você!)'); } ?>
	    </h2>
	    <p>Since: <?php echo $this->Time->niceShort($user['User']['created']); ?></p>
	</div>
	
	<div id="flashcards">
	    <table>
            <thead>
                <tr>
                    <th><?php __('Created by') ?></th>
                    <th><?php __('Front') ?></th>
                    <th><?php __('Back') ?></th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($user['FlashcardsUser'] as $f) { ?>
                <tr>
                    <td><?= $this->Html->link($f['Flashcard']['Owner']['username'], array('controller' => 'users', 'action'=> 'view', $f['Flashcard']['Owner']['id'])); ?></td>
                    <td><?= $this->Html->link(
                        $this->Text->truncate($f['Flashcard']['front'], 50),
                        array('controller' => 'flashcards', 'action'=> 'view', $f['Flashcard']['id'])
                    ); ?></td>
                    <td><?= $this->Text->truncate($f['Flashcard']['back'], 40); ?></td>
                </tr>
                <?php } ?>
            </tbody>
            
	    </table>
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

