
<div class='box'>
	<h3><?php __('Latest Flashcards') ?></h3>
	
	<ul>
	<?php
	$latest_flashcards = $this->requestAction(
		array('controller' => 'flashcards', 'action'=>'getLatest')
	);
	
	foreach($latest_flashcards as $f):
	    echo '<li>'. $this->Html->link(
	        $this->Text->truncate($f['Flashcard']['front'], 50),
	        array(
	        'controller' => 'flashcards',
	        'action'     => 'view',
	        $f['Flashcard']['id']
	    )) .'</li>';
	endforeach; ?> 
	</ul>
</div>

