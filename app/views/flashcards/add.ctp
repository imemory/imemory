
<?php $this->set('title_for_layout','Add Flashcards - imemory.com.br') ; ?>

<div class='main flashcards'>
<h2><?php __('Add one flashcard'); ?></h2>
<?php echo $this->Form->create('Flashcard', array('action' => 'add'))?>
<?php echo $this->Form->input('Flashcard.front', array('label' => __('Frente', true))); ?>
<?php echo $this->Form->input('Flashcard.back', array('label' => __('Costas', true))); ?>
<?php echo $this->Form->End(__('Add Flashcard', true))?>
</div>

<div class='sidebar'>
    <div class="box">
        <p>
        Você gostaria de adicionar muitos flashcards de uma só vez?<br />
        Nós podemos lhe ajudar. Entre em contato.
        </p>
    </div>
</div>

