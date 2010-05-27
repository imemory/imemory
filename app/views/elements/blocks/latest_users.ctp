
<div class='box'>
	<h3>Latest Users</h3>
	<?php
	$latest_users = $this->requestAction(
		array('controller' => 'users', 'action'=>'getLatest')
	);
	
	foreach($latest_users as $user): ?>
		<?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?>
	<?php endforeach; ?>
</div>

