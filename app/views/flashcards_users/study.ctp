<div class="wide-main">
    
    <?php if ($flashcard == false) { ?>
    <p><?php __('You haven´t added any Flashcard yet.') ?> 
    <?php echo $this->Html->link(__('Go to Flashcards page', true),
    array('controller' => 'flashcards')); ?>
    <?php __('and look for some interesting subject.') ?></p>
    <?php } else { ?>
    
    <div id="flashcard-metter">
        <?php
            if ($count < 10) {
                echo $this->Html->image('metter/metter_0.png');
            }
            if ($count >= 10 AND $count < 20) {
                echo $this->Html->image('metter/metter_16.png');
            }
            
            if ($count >= 20 && $count < 30) {
                echo $this->Html->image('metter/metter_32.png');
            }
            
            if ($count >= 30 && $count < 40) {
                echo $this->Html->image('metter/metter_50.png');
            }
            
            if ($count >= 40 && $count < 50) {
                echo $this->Html->image('metter/metter_66.png');
            }
            
            if ($count >= 50 && $count < 60) {
                echo $this->Html->image('metter/metter_83.png');
            }
            
            if ($count >= 60) {
                echo $this->Html->image('metter/metter_100.png');
            }
        ?>
    </div>
    
    <div id="flashcard">
        <div id="flashcard-front">
            <div>
                <div>
                    <div>
                        <?php echo nl2br(h($flashcard[0]['front'])); ?> 
                    </div>
                </div>
            </div>
        </div>
        
        <div  id="flashcard-back">
            <div>
                <div>
                    <div>
                        <?php echo nl2br(h($flashcard[0]['back'])); ?> 
                    </div>
                </div>
            </div>
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
    
    <p class="remember-links-container">
    
    <?= $this->Html->link(__('I don´t remember!', true),
        array(
            'controller' => 'flashcards_users',
            'action'     => 'no_hit',
            $flashcard[0]['id']
        ),
        array(
            'class' => 'big-link i-do-not-remember'
        )
    ); ?>
    
    <?= $this->Html->link(__('I remember!', true),
        array(
            'controller' => 'flashcards_users',
            'action'     => 'hit',
            $flashcard[0]['id']
        ),
        array(
            'class' => 'big-link i-remember'
        )
    ); ?>
    
    </p>
    
    <p class="flip-flashcard-container">
        <?= $this->Html->link(__('Flip Flashcard', true),
        '#',
        array(
            'class' => 'big-link flip-flashcard-link'
        )
    ); ?>
    </p>
    <?php } ?>
    
    <?php echo $this->element('locale/'. $session->read('Config.language') .'_how_ordering'); ?>
    
</div>
