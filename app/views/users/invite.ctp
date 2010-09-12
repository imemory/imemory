
<?php $this->set('title_for_layout','Invite - imemory.com.br') ; ?>

<div class='main users'>
	
	<h2><strong><?= $this->Html->link('Invite', array('action' => 'invite')) ?></strong>
	your friends!</h2>
	
	<p>
	    Para convidar seus amigos, informe o e-mail deles um por linha.
	    <?php echo $this->Form->create('User', array('action' => 'invite')); ?>
        <?php echo $this->Form->textarea('User.emails', array('style' => 'height: 10em; width: 98%;')); ?>
	    <?php echo $this->Form->end('Invite'); ?>
	</p>
	
</div>

<div class='sidebar'>
	<div class="block">
	    <h3>Como funciona?</h3>
	    <p>Nós enviaremos uma mensagem para eles...</p>
	</div>
</div>

