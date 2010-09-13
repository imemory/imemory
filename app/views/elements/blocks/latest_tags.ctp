
<div class='box'>
	<h3><?php __('Latest Tags') ?></h3>
	<ul>
	<?php
	$latest_tags = $this->requestAction(
		array('controller' => 'tags', 'action'=>'getLatest')
	);
    
	foreach($latest_tags as $tag): ?> 
		<li><?= $this->Html->link(
			$tag['Tag']['name'],
			array(
				'controller' => 'tags',
				'action' => 'view',
				$tag['Tag']['id']
			)
		) ?></li>
	<?php endforeach; ?> 
	</ul>
</div>
