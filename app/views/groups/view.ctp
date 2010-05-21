<div>
	<h3>Join</h3>
	<?= $this->Form->create('Membership', array('action' => 'create')) ?>
	<?= $this->Form->input('Membership.group_id', array('type' => 'hidden', 'value' => $group['Group']['id'])) ?>
	<?= $this->Form->end('Signup') ?>
</div>
<?php

pr($group);
