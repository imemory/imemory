
<?php $this->set('title_for_layout','Flashcards online - Create, learn, and share - iMemory') ; ?>

<?php echo $this->Html->script('vimeo.js', array('inline' => false)); ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
	$(document).ready(function(){
		$.vimeo('#video-placeholder', 'http://www.vimeo.com/757219');
	});
<?php echo $this->Html->scriptEnd(); ?>


<div class='main home'>
	
	<h2>O <strong>iMemory</strong> salvará sua vida nos estudos!</h2>
	
	<div class='presentation'>
		<p id='video-placeholder'>TODO: Transcrição do video aqui!</p>
	</div>
	
	<div class="home-featured">
		<div>
			<h3>Estude fácil</h3>
			<p>Não fique durante horas frente a livros chatos. Estudar deve
			ser uma tarefa divertida. Se você não gosta de estudar da maneira
			tradicional, vai adorar o iMemory.</p>
		</div>
		
		<div>
			<h3>Conheça pessoas legais</h3>
			<p>faça amigos inteligentes que querem aprender e ajudar outras pessoas,
			chame seus amigos e seus professores para compartilhar o que eles sabem.
			Vamos usar a Internet em nosso favor.</p>
		</div>
	</div>
</div>

<div class='sidebar'>
	<?= $this->element('blocks/latest_users') ?>
</div>

