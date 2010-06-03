
<div class='main group_messages-view'>
	<h2>Group Messages</h2>
	
	<?php $odd = 0; foreach($messages as $message): $odd++; ?>
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
</div>
