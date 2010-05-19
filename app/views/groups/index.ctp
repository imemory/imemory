
<?php foreach($latest_groups as $group) { ?> 
<div>
	<h3><?= $this->Html->link(
		$group['Group']['name'],
		array('action' => 'view', $group['Group']['id'])
	) ?></h3>
	<p><?= $group['Group']['description'] ?></p>
</div>
<?php } ?>

