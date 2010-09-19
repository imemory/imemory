
<?php $this->set('title_for_layout', __('Interesting groups', true) . ' - imemory.com.br') ; ?>
<div class='main groups-add'>
	<h2><?php __('Create new group') ?></h2>
	
	<?= $this->Form->create('Group') ?>
		<?=	$this->Form->input('Group.name', array('type' => 'text', 'label' => __('Name', true))) ?>
		<?=	$this->Form->input('Group.description', array('label' => __('Description', true))) ?>
	<?=	$this->Form->end(__('Create', true)) ?>
</div>

<div class='sidebar'>
	<?php echo $this->element('locale/'. $session->read('Config.language') .'_what_groups'); ?>
</div>
