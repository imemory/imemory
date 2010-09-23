
<?php $this->set('title_for_layout','Flashcards - imemory.com.br') ; ?>

<div class='main flashcards'>

    <h2><?php __('Billions of')?> <?= $this->Html->link('Flashcards', array('action' => 'index')) ?> <?php __('for you to study') ?>!</h2>
    
    <?php echo $this->Form->create('Flashcard', array('action' => 'index')); ?>
    
    <div id="form-flashcard-add-top" style="text-align: right;">
        <?php echo $this->Form->button(__('Add to my deck', true), array('name' => 'data[action]', 'value' => 'add_user')); ?>
        
        or <?php echo $this->Form->select('Group.id', array('a', 'asdfa dsfasdfad')); ?>
        
        <?php echo $this->Form->button(__('Add', true), array('name' => 'data[action]', 'value' => 'add_group')); ?>
    </div>
    
    <table>
        <thead>
            <tr>
                <th><?php __('Add') ?></th>
                <th><?php __('User') ?></th>
                <th><?php __('Front') ?></th>
                <th><?php __('Back') ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($flashcards as $f) { ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Flashcard.'.$f['Flashcard']['id']); ?></td>
                <td><?= $this->Html->link($f['Owner']['username'], array('controller' => 'users', 'action'=> 'view', $f['Owner']['id'])); ?></td>
                <td><?= $this->Html->link(
                    $this->Text->truncate($f['Flashcard']['front'], 50),
                    array('controller' => 'flashcards', 'action'=> 'view', $f['Flashcard']['id'])
                ); ?></td>
                <td><?= $this->Text->truncate($f['Flashcard']['back'], 40); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <?php echo $this->Form->end(); ?>
    
    <div class='paginate'>
        <?= $this->Paginator->first('« '. __('First', true) .' ') ?>
        <?= $this->Paginator->prev('« '. __('Previous', true) .' ', null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' '. __('Next', true) .' »', null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->last(' '. __('Last', true) .' »') ?>
    </div>

</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(
    		__('Create your Flashcards', true),
		    array('action' => 'add'),
		    array('class' => 'button')
		) ?></p>
	</div>
	
	<?php echo $this->element('locale/'. $session->read('Config.language') .'_what_flashcards'); ?>
</div>

