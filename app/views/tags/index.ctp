<div class='main tags'>
	<h2>Uma nuvem de <strong><?= $this->Html->link('Tags', array('action' => 'index')) ?></strong></h2>
	
	<ul>
	<?php foreach($tags as $tag): $tag = $tag['Tag']; ?>
		<li><?= $this->Html->link(
			$tag['name'],
			array(
				'action' => 'view',
				$tag['id']
			),
			array('style' => 'font-size: ' . (100 + ($tag['flashcard_count'] * 0.5) + $tag['flashcard_count']) .'%;')
		) ?></li>
	<?php endforeach; ?>
	</ul>
</div>

<div class='sidebar'>

	<div class='box'>
		<h3>Uma nuvem de tags</h3>
		<p>As tags são usadas para juntar os flashcards de um mesmo assunto.
		Aqui apresentamos elas como uma nuvem e é muito simples de entender.
		Quanto maior a tag, mais ela foi usada.</p>
	</div>
	
	<?= $this->element('blocks/latest_tags') ?>
</div>

