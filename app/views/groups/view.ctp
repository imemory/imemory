
<div class='main groups-view'>
	
	<h2><?= $group['Group']['name'] ?></h2>
	
	<?= $this->Form->create('Membership', array('action' => 'add')) ?>
	<?= $this->Form->input('Membership.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->end(__('Join', true)) ?>
	
	<p><?= $group['Group']['description'] ?></p>
	<p><?= __('created by', true) ?>: <?= $this->Html->link(
        $group['Owner']['username'],
        array('controller' => 'users', 'action'=> 'view', $group['Owner']['id'])
    ) ?></p>
	
	<?php if ($this->Session->read('Auth.User.id') == $group['Group']['owner_id']) { ?>
		<?= $this->Html->link('edit', array('action' => 'edit', $group['Group']['id'])); ?>
	<?php } ?>
	
	<h3>Messages <?= $this->Html->link(
		__('View all messages', true),
		array(
			'controller' => 'group_messages',
			'action' => 'view',
			$group['Owner']['id']
		)
	) ?></h3>
	
	<?php if (empty($group['GroupMessage'])): ?>
		<p>Nenhuma mensagem para este grupo.</p>
	<?php else: ?>
		<?php $odd = 0; foreach ($group['GroupMessage'] as $message): $odd++; ?>
		<div class='message <?php echo ($odd % 2 == 0) ? 'odd' : 'even'; ?>'>
			<p><?= $message['message']; ?></p>
			<p class="author">Criado por:
			<?= $this->Html->link(
				$message['User']['username'],
				array(
					'controller' => 'users',
					'action' => 'view',
					$message['User']['id'],
				));
			?>
			Em <?= $message['created'] ?>
			</p>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<?= $this->Form->create('GroupMessage', array('url' => array(
		'controller' => 'group_messages',
		'action' => 'add'
	))) ?>
	
	<?= $this->Form->input('GroupMessage.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->input('GroupMessage.message', array('type' => 'textarea')) ?>
	<?= $this->Form->end('Enviar') ?>
</div>

<div class='sidebar'>

</div>
