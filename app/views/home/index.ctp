
<?php $this->set('title_for_layout',__('Flashcards online - Create, learn and share - iMemory', true)) ; ?>

<div class='main home'>
	<?php echo $this->element('locale/'. $session->read('Config.language') .'_home'); ?>
</div>

<div class='sidebar'>
	<?= $this->element('blocks/latest_users') ?>
	
	<?= $this->element('blocks/latest_groups') ?>
</div>

