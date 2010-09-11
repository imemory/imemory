<?php $this->set('title_for_layout','First Time - imemory.com.br') ; ?>

<div class='main about'>
	<h2>this is your <strong><?= $this->Html->link('first time?', array('action' => 'index')) ?></strong></h2>
	
	<p>Agradecer... <br />Dicas do primeiro acesso.</p>
</div>

<div class='sidebar'>
    <?php echo $this->Html->link('Não mostrar mais', '/'); ?>
</div>

