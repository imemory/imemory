<div>
	<h3>Join</h3>
	<?= $this->Form->create('Membership', array('action' => 'create')) ?>
	<?= $this->Form->input('Membership.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->end('Signup') ?>
	
	<?php if ($this->Session->read('Auth.User.id') == $group['Group']['owner_id']) { ?>
		<?= $this->Html->link('edit', array('action' => 'edit', $group['Group']['id'])); ?>
	<?php } ?>
</div>
<?php

pr($group);
