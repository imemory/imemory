
<div class='main'>
    
	<h2>Grupos</h2>
    
    <dl>
    <?php foreach($groups as $group): ?>
        <dt><?= $this->Html->link(
            $group['Group']['name'],
            array('action' => 'view', $group['Group']['id'])
        ) ?></dt>
        
        <dd>
            <p><?= $group['Group']['description'] ?></p>
            <p>criado por: <?= $this->Html->link(
                $group['Owner']['username'],
                array('controller' => 'users', 'action'=> 'view', $group['Owner']['id'])
            ) ?></p>
        </dd>
    <?php endforeach; ?>
    </dl>
    
    <div class='paginate'>
        <?= $this->Paginator->prev('« voltar ', null, null, array('class' => 'disabled')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' avançar »', null, null, array('class' => 'disabled')) ?>
    </div>
</div>

<div class='sidebar'>
<p><?= $this->Html->link(
    'Criar um grupo',
    array('action' => 'add')
) ?></p>
</div>

