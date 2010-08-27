<div class="wide-main">
    
    <?= $this->Html->link('Adicionar este flashcard', array(
        'controller' => 'flashcards_users',
        'action'     => 'add',
        $flashcard['Flashcard']['id']
    )); ?>
    
    <div id="flashcard">
        <div id="flashcard-front">
            <?= nl2br($flashcard['Flashcard']['front']); ?>
        </div>
        
        <div  id="flashcard-back">
            <?= nl2br($flashcard['Flashcard']['back']); ?>
        </div>
        
        <p class="flashcard-info">
            Criado por: <?= $this->Html->link(
                $flashcard['Owner']['username'],
                array(
                    'controller' => 'users',
                    'action' => 'view',
                    $flashcard['Owner']['id']
                )); ?>
                em <?= $this->Time->nice($flashcard['Flashcard']['created'])?>
        </p>
    </div>
    
    <hr />
    
</div>
