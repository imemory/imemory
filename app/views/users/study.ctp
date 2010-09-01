<div class="wide-main">
    
    <?php if ($flashcard == false) { ?>
    <p><?php __('Você não adicionou nenhum flashcard ainda.') ?> 
    <?php echo $this->Html->link(__('Vá até a página dos flashcards', true),
    array('controller' => 'flashcards')); ?>
    <?php __('e pesquise por algum assunto interessante.') ?></p>
    <?php } else { ?>
    
    <p>
    <?= $this->Html->link(__('Eu me lembro!', true),
        array(
            'controller' => 'users',
            'action'     => 'study'
        ),
        array(
            'class' => 'big-link i-remember'
        )
    ); ?>
    
    <?= $this->Html->link(__('Não me lembro!', true),
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
            <?php __('Criado por') ?>: <?= $this->Html->link(
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
