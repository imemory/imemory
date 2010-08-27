
<?php $this->set('title_for_layout','Flashcards - imemory.com.br') ; ?>

<div class='main flashcards'>

<h2>Bilhões de <?= $this->Html->link(__('Flashcards', true), array('action' => 'index')) ?> para você estudar!</h2>

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Front</th>
            <th>Back</th>
            <th>Add</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($flashcards as $f) { ?>
        <tr>
            <td><?= $this->Html->link($f['Owner']['username'], array('controller' => 'users', 'action'=> 'view', $f['Owner']['id'])); ?></td>
            <td><?= $this->Html->link(
                $this->Text->truncate($f['Flashcard']['front'], 50),
                array('controller' => 'flashcards', 'action'=> 'view', $f['Flashcard']['id'])
            ); ?></td>
            <td><?= $this->Text->truncate($f['Flashcard']['back'], 40); ?></td>
            <td><?=
                $this->Form->create('Flashcard',
                    array(
                        'url' => array('controller' => 'flashcards_users', 'action' => 'add'),
                        'id' => 'flashformadd'.$f['Flashcard']['id']
                    )
                 ) .
                $this->Form->hidden('Flashcard.id', array('value' => $f['Flashcard']['id'])) .
                $this->Form->button('add') .
                $this->Form->end();
            ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class='paginate'>
    <?= $this->Paginator->prev(__('« voltar ', true), null, null, array('class' => 'disabled')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__(' avançar »', true), null, null, array('class' => 'disabled')) ?>
</div>

</div>

<div class='sidebar'>
	<div class='box'>
		<p><?= $this->Html->link(
    		__('Crie seus flashcards', true),
		    array('action' => 'index'),
		    array('class' => 'button')
		) ?></p>
	</div>
	
	<div class='box'>

	</div>
</div>

