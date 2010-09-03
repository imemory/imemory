<div class="wide-main">
    
    <?php if ($flashcard == false) { ?>
    <p><?php __('You haven´t added any Flashcard yet.') ?> 
    <?php echo $this->Html->link(__('Go to Flashcards page', true),
    array('controller' => 'flashcards')); ?>
    <?php __('and look for some interesting subject.') ?></p>
    <?php } else { ?>
    
    <p>
    <?= $this->Html->link(__('I remember!', true),
        array(
            'controller' => 'users',
            'action'     => 'study'
        ),
        array(
            'class' => 'big-link i-remember'
        )
    ); ?>
    
    <?= $this->Html->link(__('I don´t remember...', true),
        array(
            'controller' => 'users',
            'action'     => 'study'
        ),
        array(
            'class' => 'big-link i-do-not-remember'
        )
    ); ?>
    
    </p>
    
    <div id="flashcard">
        <div id="flashcard-front">
            <?= nl2br($flashcard[0]['front']); ?>
        </div>
        
        <div  id="flashcard-back">
            <?= nl2br($flashcard[0]['back']); ?>
        </div>
        
        <p class="flashcard-info">
            <?php __('Created by') ?>: <?= $this->Html->link(
                $flashcard[0]['username'],
                array(
                    'controller' => 'users',
                    'action' => 'view',
                    $flashcard[0]['user_id']
                )); ?>
                em <?= $this->Time->nice($flashcard[0]['created'])?>
        </p>
    </div>
    
    <hr />
    
    <?php } ?>
    
</div>
