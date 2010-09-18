<div class='main tags'>
	<h2>Flashcards com a tag <?php echo $this->Html->link($tag['Tag']['name'], array(
	    'controller' => 'tags',
	    'action'     => 'view',
	    $tag['Tag']['id']
	)); ?></h2>
	
	<table>
        <thead>
            <tr>
                <th><?php __('User') ?></th>
                <th><?php __('Front') ?></th>
                <th><?php __('Back') ?></th>
                <th><?php __('Add') ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($tag['FlashcardsTag'] as $f) { ?>
            <tr>
                <td><?= $this->Html->link($f['Flashcard']['Owner']['username'], array('controller' => 'users', 'action'=> 'view', $f['Flashcard']['Owner']['id'])); ?></td>
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
</div>

<div class='sidebar'>
    <?= $this->element('locale/'. $session->read('Config.language') .'_sidebar_tags') ?>
	<?= $this->element('blocks/latest_tags') ?>
</div>

