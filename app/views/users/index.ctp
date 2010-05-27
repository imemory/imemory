
<?php $this->set('title_for_layout','Pessoas interessantes - imemory.com.br') ; ?>

<div class='main users'>
	<h2><strong><?= $this->Html->link('Pessoas', array('action' => 'index')) ?></strong>
	com quem você gostaria de estudar</h2>
	
	<h3>Estudantes que se destacaram</h3>
	
	<h3>Os Últimos usuários cadastrados</h3>
	
</div>

<div class='sidebar'>
	<?= $this->element('blocks/signup') ?>
	<?= $this->element('blocks/latest_users') ?>
</div>

