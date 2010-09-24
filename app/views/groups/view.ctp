
<?php $this->set('title_for_layout',
	$group['Group']['name'] . ' - imemory.com.br') ; ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function(){
		$('.groups-view').tabs();
	});
<?php $this->Html->scriptEnd(); ?>

<div class='sidebar'>

<?php if ( ! $is_member): ?>
	<?= $this->Form->create('Membership', array('action' => 'add')) ?>
	<?= $this->Form->input('Membership.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->end(__('Join', true)) ?>
<?php else: ?>
	<?= $this->Form->create('Membership', array('action' => 'delete')) ?>
	<?= $this->Form->input('Membership.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->end(__('Unjoin', true)) ?>
<?php endif; ?>

<?php echo $this->element('locale/'. $session->read('Config.language') .'_what_groups'); ?>
</div>

<div class='main groups-view'>
    <ul>
		<li><a href="#group">Grupo</a></li>
		<li><a href="#group-flashcards"><?php echo __('Flashcards');?></a></li>
	</ul>
	
	<div id="group">
	    <h2><?= $group['Group']['name'] ?></h2>
	    <p>Criado por: <?php echo $this->Html->link('Fulano',
            array(
                'controller' => 'users',
                'action'     => 'view',
                $group['Owner']['id']
            )
	    ); ?> em 
	    <?php echo $this->Time->niceShort($group['Group']['created']); ?>.</p>
	    <p><?php echo $group['Group']['membership_count']; ?>
	    <?php if ($group['Group']['membership_count'] == 1) { ?>
	        pessoa faz
	    <?php } else { ?>
	        pessoas fazem
	    <?php } ?>
	    
	    parte deste grupo.</p>
	    <p>Foram adicionados <?php echo $group['Group']['flashcard_count']; ?> flashcards.</p>
	    
	    <h3>Messages <?= $this->Html->link(
		__('View all messages', true),
		array(
			'controller' => 'group_messages',
			'action' => 'view',
			$group['Group']['id']
		)
	) ?></h3>
	
	<?php if (empty($messages)): ?>
		<p>Nenhuma mensagem para este grupo.</p>
	<?php else: ?>
		<?php $odd = 0; foreach ($messages as $message): $odd++; ?>
		<div class='message <?php echo ($odd % 2 == 0) ? 'odd' : 'even'; ?>'>
			<p><?= $message['GroupMessage']['message']; ?></p>
			<p class="author">Criado por:
			<?= $this->Html->link(
				$message['User']['username'],
				array(
					'controller' => 'users',
					'action' => 'view',
					$message['User']['id'],
				));
			?>, <?= $this->Time->niceShort($message['GroupMessage']['created']) ?>
			</p>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<?= $this->Form->create('GroupMessage', array('url' => array(
		'controller' => 'group_messages',
		'action' => 'add'
	))) ?>
	
	<?= $this->Form->input('GroupMessage.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->input('GroupMessage.message', array('type' => 'textarea', 'class' =>'ckeditor')) ?>
	<?= $this->Form->end('Enviar') ?>
    </div>
    
    <div id="group-flashcards">
	    <h2>Flashcards <?= $group['Group']['name'] ?></h2>
	    <p>Criado por: Fulano em 10 de 2918.</p>
	    <p>4 pessoas fazem parte deste grupo.</p>
    </div>
</div>

