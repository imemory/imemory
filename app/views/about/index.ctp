
<?php $this->set('title_for_layout','About - imemory.com.br') ; ?>

<div class='main about-page'>
    <?php echo $this->element('locale/'. $session->read('Config.language') .'_about'); ?>
</div>

<div class='sidebar'>
    <?php echo $this->element('blocks/social'); ?>
</div>

