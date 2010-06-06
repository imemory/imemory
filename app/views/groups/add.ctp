
<?php $this->set('title_for_layout','Grupos legais - imemory.com.br') ; ?>
<div class='main groups-add'>
	<h2>Criar novo grupo</h2>
	
	<?= $this->Form->create('Group') ?>
		<?=	$this->Form->input('Group.name', array('type' => 'text')) ?>
		<?=	$this->Form->input('Group.description') ?>
	<?=	$this->Form->end('Create') ?>
</div>
