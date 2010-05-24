
<div class='main users'>
    
	<h2><?= __('Groups', true) ?></h2>
    
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
        <?= $this->Paginator->prev(__('« voltar ', true), null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__(' avançar »', true), null, null, array('class' => 'disabled')) ?>
    </div>
</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(
    		__('Create a new group', true),
		    array('action' => 'add')
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

