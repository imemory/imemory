
<?php $this->set('title_for_layout','Add Flashcards - imemory.com.br') ; ?>

<div class='main flashcards'>
    <h2><?php __('Add one flashcard'); ?></h2>
    <?php echo $this->Form->create('Flashcard', array('action' => 'add'))?>

    <div class="input">
        <?php echo $this->Form->label('Flashcard.front', __('Front', true)); ?>
        <?php echo $this->Form->error('Flashcard.front'); ?>
        <?php echo $this->Form->textarea('Flashcard.front'); ?>
    </div>
    
    <div class="input">
        <?php echo $this->Form->label('Flashcard.back', __('Back', true)); ?>
        <?php echo $this->Form->error('Flashcard.back'); ?>
        <?php echo $this->Form->textarea('Flashcard.back'); ?>
    </div>
    
    <div class="input text">
        <?php echo $this->Form->label('Flashcard.tags', __('Tags', true)); ?>
        <?php echo $this->Form->error('Flashcard.tags'); ?>
        <?php echo $this->Form->text('Flashcard.tags'); ?>
    </div>
    
    <?php echo $this->Form->End(__('Add Flashcard', true)); ?>
    
</div>

<div class='sidebar'>
    <div class="box">
        <h3>Muitos flashcards?</h3>
        <p>
        Você gostaria de adicionar muitos flashcards de uma só vez?<br />
        Nós podemos lhe ajudar.
        <?php echo $this->Html->link('Entre em contato', array(
            'controller' => 'contact'
        )); ?>.
        </p>
    </div>
</div>

