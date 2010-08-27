<div class="wide-main">
    
    <?php if ($flashcard == false) { ?>
    <p>Você não adicionou nenhum flashcard ainda. Vá até a 
    <?php echo $this->Html->link('página dos flashcards',
    array('controller' => 'flashcards')); ?>
    
    e pesquise por algum assunto interessante.</p>
    <?php } else { ?>
    
    <p>
    <?= $this->Html->link('Eu me lembro!',
        array(
            'controller' => 'users',
            'action'     => 'study'
        ),
        array(
            'class' => 'big-link i-remember'
        )
    ); ?>
    
    <?= $this->Html->link('Não me lembro!',
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
            Criado por: <?= $this->Html->link(
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
