
<?php $this->set('title_for_layout','About - imemory.com.br') ; ?>

<div class='main contact'>
	<h2>Entre em <strong><?= $this->Html->link('Contato', array('action' => 'index')) ?></strong></h2>
	
    <p>Para entrar em contato, envie um e-mail para project.imemory[at]gmail.com</p>
</div>

<div class='sidebar'>
    <?php echo $this->element('blocks/social'); ?>
</div>

