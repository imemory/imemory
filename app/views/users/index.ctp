
<div class='main'>
	<h2>Pessoas</h2>
	<?php pr($latest_users); ?>
</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(__('signup', true), array('action' => 'signup')) ?></p>
	</div>
</div>

