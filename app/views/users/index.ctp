
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main'>
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(__('signup', true), array('action' => 'signup')) ?></p>
	</div>
	
	<div class='box'>
		<?php pr($latest_users); ?>
	</div>
</div>

