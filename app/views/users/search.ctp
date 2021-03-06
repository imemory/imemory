
<?php $this->set('title_for_layout','Pesquisa de pessoas - imemory.com.br') ; ?>

<div class='main users-search'>
    
	<h2><?= $this->Html->link(__('Find', true), array('action' => 'index')) ?> <?php __('new friends') ?></h2>
    
    <?= $this->Form->create(false) ?>
    	<?= $this->Form->input('s', array('type' => 'text', 'label' => __('Keywords', true))) ?>
    <?= $this->Form->end(__('Search', true)) ?>
    
    <?php if (empty($users)): ?>
    
    <p><?= __('No user found', true) ?>.</p>
    
    <?php else: ?>
    
    <dl>
    <?php foreach($users as $user): ?>
        <dt><?= $this->Html->link(
            $user['User']['username'],
            array('action' => 'view', $user['User']['id'])
        ) ?></dt>
        
        <dd>
            <p>
                <?= $this->Gravatar->link($user['User']['id'], $user['User']['email']) ?>
                Mais informações sobre o usuário aqui como a quantidade de cartões e etc...
            </p>
        </dd>
    <?php endforeach; ?>
    </dl>
    
    <?php endif; ?>
    
    <div class='paginate'>
        <?= $this->Paginator->first('« '. __('First', true) .' ') ?>
        <?= $this->Paginator->prev('« ' . __('Previous', true) . ' ', null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' ' . __('Next', true) . ' »', null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->last(' '. __('Last', true) .' »') ?>
    </div>
</div>

<div class='sidebar'>
	<?= $this->element('blocks/signup') ?>
	<?= $this->element('blocks/latest_users') ?>
</div>

