
<?php $this->set('title_for_layout', __('Interesting groups', true) . ' - imemory.com.br') ; ?>

<div class='main groups'>
    
	<h2><?= $this->Html->link(__('Groups', true), array('action' => 'index')) ?></h2>
    
    <?= $this->Form->create(false) ?>
    	<?= $this->Form->input('s', array('type' => 'text', 'label' => __('Group', true))) ?>
    <?= $this->Form->end(__('Search', true)) ?>
    
    <?php if (empty($groups)): ?>
    
    <p><?= __('No groups found', true) ?>.</p>
    
    <?php else: ?>
    
    <dl>
    <?php foreach($groups as $group): ?>
        <dt><?= $this->Html->link(
            $group['Group']['name'],
            array('action' => 'view', $group['Group']['id'])
        ) ?></dt>
        
        <dd>
            <p><?= $group['Group']['description'] ?></p>
            <p><?= __('created by', true) ?>: <?= $this->Html->link(
                $group['Owner']['username'],
                array('controller' => 'users', 'action'=> 'view', $group['Owner']['id'])
            ) ?></p>
        </dd>
    <?php endforeach; ?>
    </dl>
    
    <?php endif; ?>
    
    <div class='paginate'>
        <?= $this->Paginator->prev(__('« '. __('previous', true) .' ', true), null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__(' '. __('next', true) .' »', true), null, null, array('class' => 'disabled')) ?>
    </div>
</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(
    		__('Create a new group', true),
		    array('action' => 'add'),
		    array('class' => 'button')
		) ?></p>
	</div>
	
	<div class='box'>
		<h3><?= __('Latest groups', true) ?></h3>
		
		<?php $latest = $this->requestAction(array('controller' => 'groups', 'action' => 'getLatest')); ?>
		
		<ul>
		<?php foreach($latest as $group): ?>
			<li><?= $this->Html->link(
				$group['Group']['name'],
				array('action' => 'view', $group['Group']['id'])
			) ?></li>
		<?php endforeach; ?>
		</ul>
		
	</div>
</div>

