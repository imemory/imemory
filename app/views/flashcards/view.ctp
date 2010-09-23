<div class="wide-main">
    
    <?= $this->Html->link(__('Add this Flashcard', true), array(
        'controller' => 'flashcards_users',
        'action'     => 'add',
        $flashcard['Flashcard']['id']
        ),
        array('class' => 'button')
    ); ?>
    
    <div id="flashcard">
        <div id="flashcard-front">
            <div>
                <div>
                    <div>
                        <?= h(nl2br($flashcard['Flashcard']['front'])); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div  id="flashcard-back">
            <div>
                <div>
                    <div>
                        <?= h(nl2br($flashcard['Flashcard']['back'])); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <p class="flashcard-info">
            <?php __('Created by')?>: <?= $this->Html->link(
                $flashcard['Owner']['username'],
                array(
                    'controller' => 'users',
                    'action' => 'view',
                    $flashcard['Owner']['id']
                )); ?>
                em <?= $this->Time->nice($flashcard['Flashcard']['created'])?>
        </p>
    </div>
    
        <p class="flip-flashcard-container">
        <?= $this->Html->link(__('Flip Flashcard', true),
        '#',
        array(
            'class' => 'big-link flip-flashcard-link'
        )
    ); ?>
    </p>
    
</div>
