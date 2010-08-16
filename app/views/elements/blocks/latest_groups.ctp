
<div class='box'>
	<h3>Latest Groups</h3>
	
	<?php $latest = $this->requestAction(array('controller' => 'groups', 'action' => 'getLatest')); ?>
	
	<ul>
	<?php foreach($latest as $group): ?>
		<li><?= $this->Html->link(
			$group['Group']['name'],
			array(
			    'controller' => 'groups',
    			'action' => 'view', $group['Group']['id']
            )
		) ?></li>
	<?php endforeach; ?>
	</ul>
</div>
