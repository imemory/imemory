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
    <?= $this->element('locale/'. Configure::read('Config.language') .'_sidebar_tags') ?>
	<?= $this->element('blocks/latest_tags') ?>
</div>

